<?php


namespace App\Http\Controllers;


use App\Models\Entity\tbTickets;
use App\Models\Repository\RepTbTicket;
use Doctrine\ORM\EntityManagerInterface;
use http\Client\Response;

class RelatorioController extends Controller
{
    /**
     * @param EntityManagerInterface $em
     */
    private $em;
    /**
     * @var RepTbTicket $repositorioTicket
     */
    private $repositorioTicket;

    function __construct(EntityManagerInterface $em ) {
        $this->em = $em;
        $this->repositorioTicket = $this->em->getRepository(tbTickets::class);
    }

    public function getTicketAnalise(){
        $ticketEmAnalise = $this->repositorioTicket->buscaTicketEmAnalise();
        var_dump($ticketEmAnalise);
        exit();
        if(count($ticketEmAnalise) > 0){return response()->json($ticketEmAnalise, 200);}
        else{
            return \response('Nenhum ticket em Analise Encontrado', 404);
        }

    }
}
