<?php
namespace App\Rotinas\Painel;

use App\Http\Soap\Cliente1;
use App\Http\Soap\Cliente2;
use App\Models\Persistencia\insertUpdateTicket;
use Doctrine\ORM\EntityManager;
use App\Models\Entity\tbTickets;
use App\Models\Entity\tbParametros;
use Doctrine\DBAL\Types\DateTimeType;
use App\Models\Persistencia\persistParametros;
use App\Models\Persistencia\persistTicketItem;
use Doctrine\DBAL\Platforms\SQLServer2012Platform;
use Doctrine\ORM\EntityManagerInterface;

class ProcessaDadosApi
{

    /**
     * @var Cliente1 $ClienteApi
     */
    private $ClienteApi;
    private $data;
    private $platform;
    private $persistParametros;
    private $persistTicketItem;
    private $requestDadosTicket = 'formulariohelpdesk';

    function __construct(
        EntityManagerInterface $em
    ) {
        $this->em = $em;
        $this->ClienteApi = new Cliente2($this->requestDadosTicket);
        $this->data = new DateTimeType();
        $this->platform = new SQLServer2012Platform();
        $this->persistParametros = new persistParametros($this->em);
        $this->persistTicketItem = new persistTicketItem($this->em);
    }


    public function processaDadosWS()
    {
        $dthrsincronizacao = ($this->em->find(tbParametros::class, 1))->getDthrSincronizacao();
        $dthrsincronizacaoSoap = date_format( $dthrsincronizacao ,"Y/m/d H:i:s") . ";";

       // $atualizaTicket = $this->ClienteApi->ApiBuscaTicketAlterados($dthrsincronizacaoSoap);
       // $atualizaTicket = $this->ClienteApi->ApiNovosTicket('2021/01/21 00:00:00');
       $atualizaTicket = $this->ClienteApi->ticket('99670');

        if ($atualizaTicket->statusRetorno == "ok") {

            foreach ($atualizaTicket->dados as $dado) {

                $dtalteracaoTicket = $this->data->convertToPHPValue(Date('Y-m-d H:i:s', (int) $dado->dtalteracao), $this->platform);
                $persistTicket = new insertUpdateTicket ($this->em,
                    $dado->codticket,
                    $dado->coddepartamento,
                    $dado->codcategoria,
                    $dado->codclass,
                    $dado->codstatus,
                    $dado->titulo,
                    $dado->codusuario,
                    $dado->prioridade,
                    $dado->avaliacao,
                    $dado->bloqueado,
                    $dado->dtabertura,
                    $dado->dtalteracao,
                    $dado->dtfechamento,
                    $dado->codcliente,
                    $dado->dtleituracliente,
                    $dado->dtprevisao
                );
                $persistTicket->gravaTicketsbanco();

                if ($dtalteracaoTicket >= $dthrsincronizacaoSoap) {
                    $interacaoTicket = $this->ClienteApi->ApiObterinteracaoticket($dado->codticket);
                    $interacao = $interacaoTicket->dados->obterResultDadosInteracao;
                    foreach ($interacao as $chave => $valor) {
                        $this->persistTicketItem->gravaTicketItembanco(
                            $valor->codticketitem,
                            $valor->codticket,
                            $valor->privado,
                            $valor->dtitem,
                            $valor->codusuario,
                            $valor->nomeoperador,
                            $valor->codigooriginalusuario,
                            $valor->nomecliente,
                            $valor->descricao,
                            $valor->codform,
                            $valor->codcliente
                        );
                    }
                }
            }
            $this->persistParametros->atualizadthrsinc();
            return $atualizaTicket->statusRetorno;
        } else {
            return $atualizaTicket->statusRetorno;
        }
    }
}
