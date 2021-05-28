<?php
namespace App\Models\Repository;

use App\Models\Entity\tbTicketItens;
use App\Models\Entity\tbTickets;
use App\Models\Entity\tbUsuarios;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class RepTbTicket extends EntityRepository
{

    private $em;
    private $tab_ticket;
    private $tab_ticket_itens;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->tab_ticket = tbTickets::class;
        $this->tab_ticket_itens = tbTicketItens::class;
    }

    public function BuscaTicketReenvio(string $codCliente)
    {
        $string = 'AND u.ativo = 1 AND t.codcliente NOT IN (' . $codCliente . ')';
        if ($codCliente == null) {
            $string = 'AND u.ativo = 1';
        }
        $dql = "SELECT t.codticket, t.codcliente, t.dthrreenvioticket, t.dthrreenvioticket2, u.nome
                FROM $this->tab_ticket t
                JOIN t.codusuario u
                WHERE t.codstatus = 2
                AND u.coddepartamentoint = 1
                AND u.gerente = 0" . $string;
       // AND t.codticket  = 101397
        $query = $this->em->createQuery($dql);
        $result = $query->getResult();
        return $result;
    }

    public function buscaTicketEmAnalise()
    {
        $dql = "SELECT
        R1.nome AS NomeAnalista, R1.codticket as Codticket, R2.nomecliente AS NomeCliente,  R1.titulo as Titulo,
        CASE WHEN R1.codstatus = 1 THEN 'PENDENTE EMPRESA'
        ELSE 'PENDENTE CLIENTE'
        END AS StatusTicket,
        CASE WHEN R1.codcategoria = 18 THEN 'EM ANALISE PARA O DESENVOLVIMENTO'
        ELSE 'EM ANALISE PARA O DESENVOLVIMENTO'
        END AS Classificacao,
        CASE WHEN R1.prioridade = 1 THEN 'PRIORIDADE BAIXA'
        WHEN R1.prioridade = 2 THEN 'PRIORIDADE MEDIA'
        ELSE 'PRIORIDADE ALTA'
        END AS PrioridadeTicket
        FROM
       (SELECT u.nome, t.codticket, t.titulo, t.codstatus, t.codcategoria, t.prioridade
       FROM
        tbTickets t
        JOIN tbUsuarios u
        ON u.codusuario = t.codusuario_id
        WHERE t.codcategoria = 18
        AND t.codstatus in (1,2)
        AND u.coddepartamentoint_id = 1
        AND u.ativo = 1 )  R1
        join
        (SELECT DISTINCT i.nomecliente, i.codticket_id FROM tbTicketItens i
        WHERE i.codcliente <> 0) R2
        ON (R1.codticket = R2.codticket_id)
        ORDER BY R1.nome
        ";
        $stmt = $this->em->getConnection()->prepare($dql);
        $stmt->execute();
        return $stmt->fetchAllAssociative();
    }

    public function BuscaDadosPainel()
    {
        $sql = " select * from dadosPainelTicket ORDER BY Departamento, NomeAnalista";
        $stmt = $this->em->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAllAssociative();
    }

    public function BuscaCodCliente($codTicket)
    {
        $dql = "SELECT t.codcliente FROM
        $this->tab_ticket t
        WHERE t.codticket = $codTicket";
        return $this->em->createQuery($dql)->getSingleScalarResult();
    }



}
