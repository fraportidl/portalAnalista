<?php


namespace App\Http\Soap;
use \stdClass;


class Cliente2 extends Cliente1
{
    private  $hash = '4e42da7a121acf6bf4fd8eb149f00aa8';

    public function __construct($tipoRequest)
    {
        parent::__construct($tipoRequest);
    }


    protected function montaRequestDados(): stdClass
    {
        $request = new stdClass();
        $request->hash = $this->hash;
        $request->sigla = $this->sigla;
        $request->servicekey = $this->servicekey;
        $request->dados = new stdClass();
        return $request;
    }


    public function ApiReenviaTicket(int $codTicket,string $mensagem )
    {
        $request = $this->montarequestdados();
        $request -> dados -> codticket = $codTicket . "";
        /*         $request -> dados -> enviaemail = "1"; */
        $request -> dados -> interacao = $mensagem;
        $result = $this->atualizar($request);
        return $result;
    }

    public function ApiCobrancaAnalista(int $codTicket)
    {
        $request = $this->montaRequestDados();
        $request -> dados -> codticket = $codTicket . "";
        $request -> dados -> interacao = "#retornoAutomatico";
        $request -> dados -> privado = "1";
        $request -> dados -> codstatus = "1";
        $result = $this->atualizar($request);
        return $result;
    }

    public function ConcluiTicket(int $codTicket,string $mensagem )
    {
        $request = $this->montarequestdados();
        $request -> dados -> codticket = $codTicket . "";
        $request -> dados -> codstatus = "3";
        $request -> dados -> interacao = $mensagem;
        $result = $this->atualizar($request);
        return $result;
    }

    public function EnviaMensagemSaudacao(int $codTicket, $mensagem, $dtPrevisao)
    {
        $request = $this->montarequestdados();
        $request -> dados -> codticket = $codTicket . "";
        $request -> dados -> interacao = $mensagem;
        $request -> dados -> dtprevisaostring = $dtPrevisao;
        $result = $this->atualizar($request);
        return $result;
    }


}
