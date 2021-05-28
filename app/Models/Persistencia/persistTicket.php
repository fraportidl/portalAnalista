<?php
namespace App\Models\Persistencia;

use App\Helpers\Datas;
use App\Models\Entity\tbTickets;
use App\Models\Entity\tbUsuarios;
use DateTime;
use Doctrine\DBAL\Types\DateTimeType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\DBAL\Platforms\SQLServer2012Platform;


class persistTicket
{
    private $em;
    private $platform;
    private $data;
    private $dataHoje;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->platform = new SQLServer2012Platform();
        $this->data = new DateTimeType;
        $this->dataHoje = new DateTime('now');
    }

    public function gravaTicketsbanco($codticket, $coddepartamento,$codcategoria,$codclass, $codstatus, $titulo, $codusuario,$prioridade, $avaliacao, $bloqueado, $dtabertura, $dtalteracao, $dtfechamento, $codcliente, $dtleituracliente,$dtprevisao)
    {
        $ticket = $this->em->find(tbTickets::class, (int)$codticket);

        if (!$ticket)
        {
            $ticket = new tbTickets();
            $ticket->setCodticket($codticket);
            $this->em->flush();
            /*             echo "Ticket--> {$codticket} INSERIDO <br />" ; */
            $this->em->persist($ticket);
/*          echo "Ticket--> {$codticket} ATUALIZADO <br />" ; */
            //$this->insertTickets($ticket,$coddepartamento,$codcategoria,$codclass, $codstatus, $titulo, $codusuario,$prioridade, $avaliacao,$bloqueado, $dtabertura, $dtalteracao, $dtfechamento, $codcliente, $dtleituracliente);
        }

        $this->insertTickets($ticket,$coddepartamento,$codcategoria,$codclass, $codstatus, $titulo, $codusuario,$prioridade,  $avaliacao, $bloqueado, $dtabertura, $dtalteracao, $dtfechamento, $codcliente, $dtleituracliente,$dtprevisao);


    }

    private function insertTickets($ticket,$coddepartamento,$codcategoria,$codclass, $codstatus, $titulo, $codusuario,$prioridade,  $avaliacao, $bloqueado, $dtabertura, $dtalteracao, $dtfechamento, $codcliente, $dtleituracliente,$dtprevisao)
    {
        $ticket->setCoddepartamento($coddepartamento);
        $ticket->setCodcategoria($codcategoria);
        $ticket->setCodclass($codclass);
        $ticket->setCodstatus($codstatus);
        $ticket->setTitulo($titulo);
        $ticket->setCodusuario($this->em->find(tbUsuarios::class,(int)$codusuario));
        //$ticket->setCodusuario($ticket->getCodusuario()->getCodusuario((int)$codusuario));
        //$ticket->setCodusuario($this->em->getReference(tbUsuarios::class,(int)$codusuario) );
        $ticket->setPrioridade($prioridade);
        $ticket->setAvaliacao($avaliacao);
        $ticket->setBloqueado($bloqueado);
        $ticket->setDtabertura(Datas::converteDataIntEmDataBanco((int) $dtabertura, $this->platform)) ;
        $ticket->setDtalteracao(Datas::converteDataIntEmDataBanco((int) $dtalteracao, $this->platform));
        $ticket->setDtfechamento(Datas::converteDataIntEmDataBanco((int) $dtfechamento, $this->platform));
        $ticket->setCodcliente($codcliente);
        $ticket->setDtleituracliente(Datas::converteDataIntEmDataBanco((int) $dtleituracliente,$this->platform));
        $ticket->setDtprevisao(Datas::converteDataIntEmDataBanco((int)$dtprevisao, $this->platform));
        $this->em->flush();

    }

    public function atualizadrhrReenvio($codticket, $data){
        $ticket = $this->em->find(tbTickets::class, (int)$codticket);
        $ticket->setDthrreenvioticket($data);
        $this->em->flush();
    }

    public function atualizadrhrReenvio2($codticket, $data){
        $ticket = $this->em->find(tbTickets::class, (int)$codticket);
        $ticket->setDthrreenvioticket2($data);
        $this->em->flush();
    }

    public function setaConcluidoAutomaticamente($codticket){
        $ticket = $this->em->find(tbTickets::class, (int)$codticket);
        $ticket->setConcluidoautomaticamente(1);
        $this->em->flush();
    }
}
