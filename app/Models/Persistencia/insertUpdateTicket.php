<?php
namespace App\Models\Persistencia;

use App\Helpers\Datas;
use App\Http\Soap\Cliente2;
use App\Models\Entity\tbTickets;
use App\Models\Entity\tbUsuarios;
use App\Rotinas\RotinaNovosTickets\NovosTickets;
use DateTime;
use Doctrine\DBAL\Types\DateTimeType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\DBAL\Platforms\SQLServer2012Platform;


class insertUpdateTicket
{
    private $em;
    private $platform;
    private $data;
    private $dataHoje;


    private $codticket;
    private $coddepartamento;
    private $codcategoria;
    private $codclass;
    private $codstatus;
    private $titulo;
    private $codusuario;
    private $prioridade;
    private $avaliacao;
    private $bloqueado;
    private $dtabertura;
    private $dtalteracao;
    private $dtfechamento;
    private $codcliente;
    private $dtleituracliente;
    private $dtprevisao;



    public function __construct(EntityManagerInterface $em,$codticket ,$coddepartamento, $codcategoria, $codclass ,$codstatus, $titulo, $codusuario,$prioridade, $avaliacao, $bloqueado, $dtabertura, $dtalteracao, $dtfechamento, $codcliente, $dtleituracliente,$dtprevisao)
    {
        $this->em = $em;
        $this->platform = new SQLServer2012Platform();
        $this->data = new DateTimeType;
        $this->dataHoje = new DateTime('now');


        $this->codticket = $codticket;
        $this->coddepartamento = $coddepartamento;
        $this->codcategoria = $codcategoria;
        $this->codclass = $codclass;
        $this->codstatus = $codstatus;
        $this->titulo = $titulo;
        $this->codusuario = $codusuario;
        $this->prioridade = $prioridade;
        $this->avaliacao = $avaliacao;
        $this->bloqueado = $bloqueado;
        $this->dtabertura = $dtabertura;
        $this->dtalteracao = $dtalteracao;
        $this->dtfechamento = $dtfechamento;
        $this->codcliente = $codcliente;
        $this->dtleituracliente = $dtleituracliente;
        $this->dtprevisao = $dtprevisao;


    }

    public function gravaTicketsbanco()
    {
        $ticket = $this->em->find(tbTickets::class, (int)$this->codticket);

        if (!$ticket)
        {
            //$novoTicket = new NovosTickets($this->em,(int)$this->codticket, $this->codcliente);
            //$novoTicket->processaNovosTickets();
            $ticket = new tbTickets();
            $ticket->setCodticket((int)$this->codticket);
            $this->em->flush();
            $this->em->persist($ticket);
        }

        $this->insertTickets($ticket);


    }

    private function insertTickets($ticket)
    {
        $ticket->setCoddepartamento($this->coddepartamento);
        $ticket->setCodcategoria($this->codcategoria);
        $ticket->setCodclass($this->codclass);
        $ticket->setCodstatus($this->codstatus);
        $ticket->setTitulo($this->titulo);
        $ticket->setCodusuario($this->em->find(tbUsuarios::class,(int)$this->codusuario));
        $ticket->setPrioridade($this->prioridade);
        $ticket->setAvaliacao($this->avaliacao);
        $ticket->setBloqueado($this->bloqueado);
        $ticket->setDtabertura(Datas::converteDataIntEmDataBanco((int) $this->dtabertura, $this->platform)) ;
        $ticket->setDtalteracao(Datas::converteDataIntEmDataBanco((int) $this->dtalteracao, $this->platform));
        $ticket->setDtfechamento(Datas::converteDataIntEmDataBanco((int) $this->dtfechamento, $this->platform));
        $ticket->setCodcliente($this->codcliente);
        $ticket->setDtleituracliente(Datas::converteDataIntEmDataBanco((int) $this->dtleituracliente,$this->platform));
        $ticket->setDtprevisao(Datas::converteDataIntEmDataBanco((int)$this->dtprevisao, $this->platform));
        $this->em->flush();

    }


}
