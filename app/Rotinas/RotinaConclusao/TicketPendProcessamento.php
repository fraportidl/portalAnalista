<?php

namespace App\Rotinas\RotinaConclusao;

use App\Http\Soap\Cliente2;
use App\Models\Entity\tbParametros;
use App\Models\Entity\tbTicketItens;
use App\Models\Entity\tbTickets;
use App\Models\Repository\RepTbTicket;
use App\Models\Repository\RepTbTicketItens;
use Doctrine\ORM\EntityManagerInterface;
use App\Helpers\Datas;
use App\Helpers\Log;
use App\Models\Persistencia\updateTicket;
use DateTime;
use Doctrine\ORM\NoResultException;


class TicketPendProcessamento
{
    private $em;
    /**
     * @var RepTbTicket $RepTicket
     */
    private $RepTicket;
    /**
     * @var RepTbTicketItens $RepTicketItens
     */
    private $RepTicketItens;

    private $ClienteApi;

    private $UpdateTicket;
    private $dataHoje;
    private $DatahoraAtual;
    private $requestDadosTicket = 'formulariohelpdesk';

    function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->RepTicket = $this->em->getRepository(tbTickets::class);
        $this->RepTicketItens = $this->em->getRepository(tbTicketItens::class);
        $this->ClienteApi = new Cliente2($this->requestDadosTicket);
        $this->UpdateTicket = new updateTicket($this->em);
        $this->dataHoje = date('d/m/Y H:i:s');
        $this->DatahoraAtual = new DateTime('now');


    }

    public function processaTickets()
    {
        $nomeArquivoLog = "LogProcessamentoTickets " . date('d-m-Y');
        $apagaLog = "nao";
        /**
         * @var tbParametros $parametros
         */
        $parametros = $this->em->find(tbParametros::class, 1);
        $Tickets = $this->RepTicket->BuscaTicketReenvio($parametros->getCodCliNconcl());

        foreach ($Tickets as $ticket) {

            $CodTicket = $ticket['codticket'];
            $dtultimaInteracaoAnalista = $this->RepTicketItens->BuscaUltimaInteracaoAnalistaTicket($CodTicket);
            $dtultimaInteracaoLog = date('d/m/Y H:i', strtotime($dtultimaInteracaoAnalista));
            $diffdataDiasUltIntAnalista = Datas::calculaDiffdata($dtultimaInteracaoAnalista)->d;
            $dtultimaInteracaoCliente = $this->RepTicketItens->BuscaUltimaInteracaoClienteTicket($CodTicket);
            $dtUltimaInteracaoConclTelefone = $this->RepTicketItens->BuscaUltimaInteracaoAnalistaTag($CodTicket, '#resolvidoTelefone');
            $DataUltimaInteracaoConclTelefone = new DateTime($dtUltimaInteracaoConclTelefone);
            $dtUltimaInteracao1Tentativa = $this->RepTicketItens->BuscaUltimaInteracaoAnalistaTag($CodTicket, '#tentativa1');
            $DataUltimaInteracao1Tentativa = new DateTime($dtUltimaInteracao1Tentativa);

            if ($dtultimaInteracaoCliente == NULL) {
                $dtultimaInteracaoCliente = new DateTime('2020-01-01 00:00:00');
            } else {
                $dtultimaInteracaoCliente = new DateTime($dtultimaInteracaoCliente);
            }

            try {
                $nomecliente = $this->RepTicketItens->BuscaNomeCliente((int)$ticket['codcliente']);
            } catch (NoResultException $e) {
                $nomecliente = '';
            }


            //PRIMEIRO REENVIO
            if (
                $diffdataDiasUltIntAnalista >= $parametros->getDiasReenvioTicket() &&
                is_null($ticket['dthrreenvioticket']) && is_null($ticket['dthrreenvioticket2'])
            ) {
                $mensagemReenvio = $this->criaMensagem($nomecliente, $parametros->getMensagemReenvio(), $ticket['nome']);
                $this->UpdateTicket->atualizadrhrReenvio($CodTicket, $this->DatahoraAtual);
                $this->ClienteApi->ApiReenviaTicket($CodTicket, $mensagemReenvio);
                $log = "1º Cobrança Ticket: {$CodTicket} Data Ultima Interação {$dtultimaInteracaoLog} Analista: {$ticket['nome']} Processado em: {$this->dataHoje}";
                //echo "Ticket cobrados 1º Cobrança";
                Log::GeraLog($nomeArquivoLog, $log, $apagaLog);
            }

            //SEGUNDO REENVIO/RETORNO PENDENTE EMPRESA
            if (
                $diffdataDiasUltIntAnalista >= $parametros->getDiasReenvioTicket() &&
                !is_null($ticket['dthrreenvioticket']) && is_null($ticket['dthrreenvioticket2'])
            ) {
                if ($dtultimaInteracaoCliente < $ticket['dthrreenvioticket']) {
                    //$mensagemReenvio = $this->criaMensagem($nomecliente,$parametros->getMensagemReenvio2(),'Time Suporte');
                    $this->UpdateTicket->atualizadrhrReenvio2($CodTicket, $this->DatahoraAtual);
                    $this->ClienteApi->ApiCobrancaAnalista($CodTicket);
                    $log = "Retono Pendente Empresa Ticket: {$CodTicket} Data Ultima Interação {$dtultimaInteracaoLog} Analista: {$ticket['nome']} Processado em: {$this->dataHoje}";
                    //echo "Ticket cobrados 2º Cobrança";
                    Log::GeraLog($nomeArquivoLog, $log, $apagaLog);
                } else {
                    $this->UpdateTicket->atualizadrhrReenvio($CodTicket, Null);
                }

            }

            //RETORNO PRIMEIRA TENTATIVA

           if(  is_null($dtUltimaInteracaoConclTelefone) && !is_null($dtUltimaInteracao1Tentativa) &&
                $diffdataDiasUltIntAnalista >= $parametros->getDiasConclusaoTicket() &&
                !is_null($ticket['dthrreenvioticket']) && !is_null($ticket['dthrreenvioticket2']))
           {
               $this->ClienteApi->ApiCobrancaAnalista($CodTicket);
               $log = "Retono Pendente Empresa Ticket Primeira Tentativa: {$CodTicket} Data Ultima Interação {$dtultimaInteracaoLog} Analista: {$ticket['nome']} Processado em: {$this->dataHoje}";
               //echo "Ticket cobrados 2º Cobrança";
               Log::GeraLog($nomeArquivoLog, $log, $apagaLog);
           }

            //CONCLUSAO TICKET
            if (!is_null($dtUltimaInteracaoConclTelefone)) {

                if (
                    Datas::calculaDiffdata($dtUltimaInteracaoConclTelefone)->d >= $parametros->getDiasConclusaoTicket() &&
                    !is_null($ticket['dthrreenvioticket']) && !is_null($ticket['dthrreenvioticket2'])
                ) {
                    if ($dtultimaInteracaoCliente < $DataUltimaInteracaoConclTelefone) {
                        $mensagemConclusao = $this->criaMensagem($nomecliente, $parametros->getMensagemConclusao(), 'Time Suporte');
                        $this->ClienteApi->ConcluiTicket($CodTicket, $mensagemConclusao);
                        $this->UpdateTicket->setaConcluidoAutomaticamente($CodTicket);
                        $log = "Concluido Ticket: {$CodTicket} Data Ultima Interação {$dtultimaInteracaoLog} Analista: {$ticket['nome']} Processado em: {$this->dataHoje}";
                        //echo "Ticket Concluidos";
                        Log::GeraLog($nomeArquivoLog, $log, $apagaLog);
                    }
                    else {
                        $this->UpdateTicket->atualizadrhrReenvio($CodTicket, Null);
                        $this->UpdateTicket->atualizadrhrReenvio2($CodTicket, Null);
                    }
                }

            }
        }

    }

    private function criaMensagem($nomeCliente, $mensagem, $nomeOperador)
    {
        $texto = "Olá {$nomeCliente}, <br />{$mensagem} <br /> <br /> Atenciosamente, <br/> {$nomeOperador} <br /> <br /> -----<b>Está é uma mensagem automática</b>-----";
        return $texto;
    }


}
