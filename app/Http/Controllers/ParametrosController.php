<?php


namespace App\Http\Controllers;


use App\Models\Entity\tbParametros;
use App\Models\Entity\tbTicketItens;
use App\Models\Entity\tbTickets;
use App\Models\Persistencia\persistParametros;
use App\Models\Repository\RepTbParametros;
use App\Models\Repository\RepTbTicket;
use App\Models\Repository\RepTbTicketItens;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;

class ParametrosController extends Controller
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

        $parametros = $this->em->find(tbParametros::class, 1);

        $ClientesNConclui = null;
        if($parametros->getCodCliNconcl() != null){
            $ClientesNConclui = $this->repositorioTicketItens->BuscaNomeClienteXCodigoCliente($parametros->getCodCliNconcl());
        }

        return view('PainelAdministrativo/Parametros.gerenciamentoParametros', [
            'parametros'=>$parametros,
            'clientesNaoConclui'=>$ClientesNConclui
        ]);
    }


    public function updateParametros(Request $request)
    {

        $ClientesNaoConclui = null;
        if ($request->has('codClienteNaoConclui')){
            $arrayClientesNaoConclui = $request->codClienteNaoConclui;
            foreach ($arrayClientesNaoConclui as $ClienteNaoConclui) {
                $ClientesNaoConclui .= $ClienteNaoConclui . ',';
            }
        $ClientesNaoConclui = substr($ClientesNaoConclui, 0, -1);
        }


        $persistParametros = new persistParametros($this->em);
        $persistParametros->atualizaParamRotinaConlusao((int)$request->diasReenvio,
            (int)$request->diasConclusao,
            $request->msgPrimeiroEnvio,
            $request->msgSegundoEnvio,
            $request->msgConclusao,
            $ClientesNaoConclui);

        return redirect('/paineladm/parametros');

    }

    public function buscaClienteNaoConclui(Request $request)
    {
        $codClienteNaoConclui = $this->repositorioTicket->BuscaCodCliente((int)$request->codTicket);
        $ClientesNConclui = $this->repositorioTicketItens->BuscaNomeClienteXCodigoCliente($codClienteNaoConclui);
        return response()->json($ClientesNConclui);
    }

}
