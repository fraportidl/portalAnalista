<?php


namespace App\Http\Controllers;


use App\Http\Soap\Cliente2;
use App\Models\Entity\tbDepUsuarios;
use App\Models\Entity\tbTickets;
use App\Models\Entity\tbUsuarios;
use App\Models\Persistencia\persistUsuario;
use App\Models\Repository\RepTbDepUsuarios;
use App\Models\Repository\RepTbUsuarios;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;


class AnalistasController extends Controller
{
    private $em;
    /**
     * @var RepTbUsuarios $repAnalistas
     */
    private $repAnalistas;
    private $Cliente2;
    private $tipoRequest = 'formulariohelpdesk';
    /**
     * @var RepTbDepUsuarios $RepTbDepUsuarios
     */
    private $RepTbDepUsuarios;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->repAnalistas = $this->em->getRepository(tbUsuarios::class);
        $this->Cliente2 = new Cliente2($this->tipoRequest);
        $this->RepTbDepUsuarios= $this->em->getRepository(tbDepUsuarios::class);
    }

    public function index(Request $request)
    {
       $nomeDepartamentoPesquisado = $request->departamento;


        //$chave=$request->getQueryString();

        /**
         * @var tbUsuarios $analista
         */
        $analistas = $this->repAnalistas->UsuariosXDepartamento($nomeDepartamentoPesquisado, $request->ativo);

        $departamentos = $this->RepTbDepUsuarios->buscaDepartamentos($nomeDepartamentoPesquisado);
        $ativo = $request->ativo;

return view('PainelAdministrativo/Analistas.gerenciamentoAnalista',[
    'departamentos' => $departamentos,
    'analistas'=>$analistas,
    'nomeDepartamentoPesquisado'=>$nomeDepartamentoPesquisado,
    'ativo'=>$ativo
]);

    }

public function editarAnalista(Request $request){
        $analista  = $this->em->find(tbUsuarios::class,$request->codAnalista);

        return view('PainelAdministrativo.editanalistas',[
            'analista'=> $analista
        ]);
}


    public function store(Request $request)
    {
        $codTicketAnalista = $request->codTicket;
        $ticket = $this->Cliente2->ticket($codTicketAnalista);
        $codUsuario = $ticket->dados[0]->codusuario;
        $Departamento = $this->RepTbDepUsuarios->buscaDepartamento($request->departamento);
        $IdDepartamento = $Departamento->getId();
        $nomeCompleto = $request->nome.' '.$request->sobrenome;
        $persistUsuario = new persistUsuario($this->em,(int) $codUsuario,$IdDepartamento,$request->nome,$request->sobrenome,$nomeCompleto,null, $request->gerente);
        $usuario = $persistUsuario->criaUsuario();

        return redirect('/paineladm/analistas?departamento='.$usuario->getCoddepartamentoint()->getNomedep().'&ativo='.$usuario->getAtivo());
    }

}
