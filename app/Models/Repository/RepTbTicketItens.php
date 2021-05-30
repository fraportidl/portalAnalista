<?php
namespace App\Models\Repository;

use App\Models\Entity\tbTicketItens;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class RepTbTicketItens extends EntityRepository
{
    private $em;
    private $tab_tbTicketItens;
    function __construct(EntityManagerInterface $em){
        $this->em  = $em;
        $this->tab_tbTicketItens = tbTicketItens::class;
    }

    public function BuscaNomeCliente($codTicket){
        $dql = "SELECT i.nomecliente
                FROM $this->tab_tbTicketItens i
                WHERE i.codticket = $codTicket";
        $query = $this->em->createQuery($dql)
        ->setMaxResults(1)
        ->getSingleScalarResult();
        return $query;
    }

    public function BuscaUltimaInteracaoAnalistaTicket($codticket){
        $dql = "SELECT MAX(i.dtitem)
                FROM $this->tab_tbTicketItens i
                WHERE i.codticket = $codticket
                AND i.codcliente = 0
                AND i.privado = 0";
        $query = $this->em->createQuery($dql)->getSingleScalarResult();
        return $query;
    }

    public function BuscaUltimaInteracaoClienteTicket($codticket){
        $dql = "SELECT MAX(i.dtitem)
                FROM $this->tab_tbTicketItens i
                WHERE i.codticket = $codticket
                AND i.codcliente <> 0
                AND i.privado = 0";
        $query = $this->em->createQuery($dql)->getSingleScalarResult();
        return $query;
    }

    public function BuscaNomeClienteXCodigoCliente(string $codigoCliente){
        $dql = "SELECT distinct  i.nomecliente, i.codcliente  from
        $this->tab_tbTicketItens i
        WHERE i.codcliente in ($codigoCliente)";
        $query = $this->em->createQuery($dql)->getArrayResult();
        return $query;

    }

    public function BuscaUltimaInteracaoAnalistaTag($codticket, $tag){
        $dql = "SELECT MAX(i.dtitem)
                FROM $this->tab_tbTicketItens i
                WHERE i.codticket = $codticket
                AND i.codcliente = 0
                AND i.privado = 1
                AND i.descricao like '%$tag%'";
        $query = $this->em->createQuery($dql)->getSingleScalarResult();
        return $query;
    }
}
