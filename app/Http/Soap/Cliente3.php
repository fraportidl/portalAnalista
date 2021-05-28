<?php


namespace App\Http\Soap;
use \stdClass;


class Cliente3 extends Cliente1
{
    private  $hash = 'f43167acfa21aafdbe82eaf1afbfd9ac';
    private $tipoRequest = 'formulariosolicitacao';

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


    public function solicitacao($codsolicitacao)
    {
        $request = $this->montaRequestDados();
        $request->dados->codticket = $codsolicitacao;
        $resultado = $this->obter($request);
        return $resultado;
    }
}
