<?php
namespace App\Models\Persistencia;

use App\Helpers\Datas;
use App\Models\Entity\tbTicketItens;
use App\Models\Entity\tbTickets;
use DateTime;
use Doctrine\DBAL\Types\DateTimeType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\DBAL\Platforms\SQLServer2012Platform;


class persistTicketItem
{
    private $em;
    private $platform;
    private $data;
    private $tab_tbTicketItens;
    private $dataHoje;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->platform = new SQLServer2012Platform();
        $this->data = new DateTimeType();
        $this->tab_tbTicketItens = tbTicketItens::class;
        $this->dataHoje = new DateTime('now');
    }

    public function gravaTicketItembanco($codticketitem, $codticket,$privado, $dtitem, $codusuario, $nomeoperador, $codigooriginalusuario, $nomecliente, $descricao, $codform, $codcliente )
    {
        $ticketItem = $this->em->find($this->tab_tbTicketItens, (int)$codticketitem);

        if($ticketItem)
        {
            $this->insertTicketItem($ticketItem,$codticket,$privado, $dtitem, $codusuario, $nomeoperador, $codigooriginalusuario, $nomecliente, $descricao, $codform, $codcliente);
        }
        else
        {
            $ticketItem = new tbTicketItens();
            $ticketItem->setCodticketitem($codticketitem);
            $this->em->flush();
            $this->em->persist($ticketItem);
            $this->insertTicketItem($ticketItem,$codticket,$privado, $dtitem, $codusuario, $nomeoperador, $codigooriginalusuario, $nomecliente, $descricao, $codform, $codcliente);
        }
    }


    private function insertTicketItem($ticketItem,$codticket,$privado, $dtitem, $codusuario, $nomeoperador, $codigooriginalusuario, $nomecliente, $descricao, $codform, $codcliente)
    {
            //$ticketItem->setCodticket($ticketItem->getCodticket((int)$codticket));
            $ticketItem->setCodticket($this->em->find(tbTickets::class, (int)$codticket));
            $ticketItem->setPrivado($privado);
            $ticketItem->setDtitem(Datas::converteDataIntEmDataBanco((int) $dtitem, $this->platform));
            $ticketItem->setCodusuario($codusuario);
            $ticketItem->setNomeoperador($nomeoperador);
            $ticketItem->setCodigooriginalusuario($codigooriginalusuario);
            $ticketItem->setNomecliente($nomecliente);
            $ticketItem->setDescricao($descricao);
            $ticketItem->setCodform($codform);
            $ticketItem->setCodcliente($codcliente);
            $this->em->flush();
    }


}
