<?php


namespace App\Http\Controllers;


use App\Models\Entity\tbParametros;
use App\Models\Entity\tbTicketItens;
use App\Models\Entity\tbTickets;
use App\Models\Persistencia\persistParametros;
use App\Models\Repository\RepTbParametros;
use App\Models\Repository\RepTbTicket;
use App\Models\Repository\RepTbTicketItens;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PainelAdministrativoController extends Controller
{

        /**
         * @var EntityManagerInterface $em
         */
        private
        $em;
        /**
         * @var RepTbTicketItens $repositorioTicketItens
         */
        private
        $repositorioTicketItens;

    /**
     * @var RepTbTicket $repositorioTicket
     */
        private $repositorioTicket;
    /**
     * @var RepTbParametros $repTbParametros
     */
        private $repTbParametros;

        public
        function __construct(EntityManagerInterface $em)
        {
            $this->em = $em;
            $this->repositorioTicketItens = $this->em->getRepository(tbTicketItens::class);
            $this->repTbParametros = $this->em->getRepository(tbParametros::class);
            $this->repositorioTicket = $this->em->getRepository(tbTickets::class);

        }

        public function index()
        {
            /**
             * @var tbParametros $parametros
             */
            $parametros = $this->em->find(tbParametros::class, 1);

            $ClientesNConclui = [];
            if($parametros->getCodCliNconcl() != null){
                $ClientesNConclui = $this->repositorioTicketItens->BuscaNomeClienteXCodigoCliente($parametros->getCodCliNconcl());
            }


            return view('PainelAdministrativo.index', [
                'parametros'=> $parametros,
                'ClientesNaoConclui' => $ClientesNConclui
            ]);
        }


    public function updateParametros(Request $request)
    {

        $ClientesNaoConclui = null;
        if ($request->has('ClientesNConclui')){
        $arrayClientesNaoConclui = $request->ClientesNConclui;
            foreach ($arrayClientesNaoConclui as $ClienteNaoConclui) {
                $ClientesNaoConclui .= $ClienteNaoConclui . ',';
            }
        }

        if ($request->has('CodTicket')){
        $CodticketClientesNaoConclui = $request->CodTicket;
            foreach ($CodticketClientesNaoConclui as $CodTicket){
                $codClienteNovo = $this->repositorioTicket->BuscaCodCliente($CodTicket);
                $ClientesNaoConclui .=  $codClienteNovo . ',';
            }
        }

        if ($ClientesNaoConclui == null){
            $ClientesNaoConcluiBanco = $ClientesNaoConclui;
        }else{
            $ClientesNaoConcluiBanco =  substr($ClientesNaoConclui, 0, -1);
        }


        $persistParametros = new persistParametros($this->em);
        $persistParametros->atualizaParamRotinaConlusao((int)$request->DiasReenvioTicket,
            (int)$request->DiasConclusaoTicket,
            $request->MensagemPrimeiroReenvio,
            $request->MensagemSegundoReenvio,
            $request->MensagemConclusao,
            $ClientesNaoConcluiBanco);

        return redirect()->action('PainelAdministrativoController@index');
    }
}
