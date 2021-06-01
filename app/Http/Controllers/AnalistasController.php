<?php


namespace App\Http\Controllers;


use App\Http\Soap\Cliente2;
use App\Http\Soap\Cliente3;
use App\Models\Entity\tbDepUsuarios;
use App\Models\Entity\tbUsuarios;
use App\Models\Persistencia\persistUsuario;
use App\Models\Repository\RepTbDepUsuarios;
use App\Models\Repository\RepTbUsuarios;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AnalistasController extends Controller
{
    private $em;
    /**
     * @var RepTbUsuarios $RepAnalistas
     */
    private $RepAnalistas;
    private $Cliente2;
    private $Cliente3;
    private $tipoRequest = 'formulariohelpdesk';
    /**
     * @var RepTbDepUsuarios $RepTbDepUsuarios
     */
    private $RepTbDepUsuarios;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->RepAnalistas = $this->em->getRepository(tbUsuarios::class);
        $this->Cliente2 = new Cliente2($this->tipoRequest);
        $this->Cliente3 = new Cliente3($this->tipoRequest);
        $this->RepTbDepUsuarios= $this->em->getRepository(tbDepUsuarios::class);
    }

    public function index(Request $request)
    {
       $nomeDepartamentoPesquisado = $request->departamento;


        //$chave=$request->getQueryString();

        /**
         * @var tbUsuarios $analista
         */
        $analistas = $this->RepAnalistas->UsuariosXDepartamento($nomeDepartamentoPesquisado, $request->ativo);

        $departamentos = $this->RepTbDepUsuarios->buscaDepartamentos($nomeDepartamentoPesquisado);
        $ativo = $request->ativo;

return view('PainelAdministrativo/Analistas.gerenciamentoAnalista',[
    'departamentos' => $departamentos,
    'analistas'=>$analistas,
    'nomeDepartamentoPesquisado'=>$nomeDepartamentoPesquisado,
    'ativo'=>$ativo
]);

    }


    public function store(Request $request)
    {

        $codTicketAnalista = $request->codTicket;
        $ticket = $this->Cliente2->ticket($codTicketAnalista);
        if($ticket->statusRetorno == 'consultaMenorQueLimiteDe45Segundos'){
            $ticket = $this->Cliente3->ticket($codTicketAnalista);
        }
        $codUsuario = $ticket->dados[0]->codusuario;
        $Departamento = $this->RepTbDepUsuarios->buscaDepartamento($request->departamento);
        $IdDepartamento = $Departamento->getId();
        $nomeCompleto = $request->nome.' '.$request->sobrenome;
        $caminhoImagemAnalista = str_replace('http://localhost','',Storage::url('FotoAnalista/Blue.jpg'));

        if ($request->has('imagemAnalista')){
            $imagemAnalista = $request->file('imagemAnalista')->store('fotoAnalista');
            $caminhoImagemAnalista = str_replace('http://localhost','',Storage::url($imagemAnalista));
        }

        $persistUsuario = new persistUsuario($this->em,(int) $codUsuario,$IdDepartamento,$request->nome,$request->sobrenome,$nomeCompleto,null, $request->gerente,1,$caminhoImagemAnalista);
        $usuario = $persistUsuario->criaUsuario();

        return redirect('/paineladm/analistas?departamento='.$usuario->getCoddepartamentoint()->getNomedep().'&ativo='.$usuario->getAtivo());
    }

    public function editarAnalista(Request $request){
        $analista  = $this->RepAnalistas->Usuario((int)$request->codAnalista);

        return response()->json($analista, 200);
    }

    public function updateAnalista(Request $request)
    {

        $Departamento = $this->RepTbDepUsuarios->buscaDepartamento($request->departamentoAltera);
        $IdDepartamento = $Departamento->getId();
        $nomeCompleto = $request->nomeAltera.' '.$request->sobrenomeAltera;
        $usuario =$this->em->find(tbUsuarios::class,(int)$request->codAnalista);
        $caminhoImagemAnalista = $usuario->getImagem();

        if ($request->has('imagemAnalistaAltera')){
            $imagemAnalista = $request->file('imagemAnalistaAltera')->store('fotoAnalista');
            $caminhoImagemAnalista = str_replace('http://localhost','',Storage::url($imagemAnalista));
        }

        if($caminhoImagemAnalista == null){
            $caminhoImagemAnalista = str_replace('http://localhost','',Storage::url('FotoAnalista/Blue.jpg'));
        }

        $persistUsuario = new persistUsuario($this->em,(int) $request->codAnalista,$IdDepartamento,$request->nomeAltera,$request->sobrenomeAltera,$nomeCompleto,null, $request->cargoAltera,$request->statusAltera, $caminhoImagemAnalista);
        /**
         * @var tbUsuarios $usuario
         */
        $usuario = $persistUsuario->alteraUsuario();

        return redirect('/paineladm/analistas?departamento='.$usuario->getCoddepartamentoint()->getNomedep().'&ativo=1');
    }

}
