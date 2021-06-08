<?php


namespace App\Models\Persistencia;


use App\Models\Entity\tbTickets;
use Doctrine\ORM\EntityManagerInterface;

class updateTicket
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
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
