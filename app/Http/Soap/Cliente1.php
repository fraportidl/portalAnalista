<?php
namespace App\Http\Soap;

use App\Helpers\CaracteresEspeciais;
use App\Helpers\TratamentoXML;
use App\Http\Soap\ClienteService;
use \stdClass;

class Cliente1 extends ClienteService{

    private $chaveApi = "ea9c6e90f55276cd75d253094194fb10";

    public function __construct($tipoRequest) {
        parent::__construct($this->chaveApi, $tipoRequest);
    }


    public function ticket($codticket)
    {
        $request = $this->montaRequestDados();
        $request->dados->codticket = $codticket;
        $resultado = $this->obterLista($request);
        return $resultado;
    }



    public function ApiBuscaTicketAlterados($dtalteracao){
        $request = $this->montaRequestDados();
        $request -> dados -> dtalteracao = $dtalteracao;
        try {
            $resultado  = $this->obterLista($request);
            return $resultado;
        }catch (\Exception $e){
            $xml = $this->__getLastResponse();
            $xmlLimpo = CaracteresEspeciais::substituiCaractere($xml);
            $resultado = TratamentoXML::processaXmlTicket($xmlLimpo);
            return $resultado;
        }
    }



    public function ApiObterinteracaoticket(string $codticket)
    {
        $request = $this->montaRequestDados();
        $request->dados->codticket = $codticket;
        $request->dados->incluiprivadas = 1;
        try {
            $resultado = $this->obter($request);
            return $resultado;

        }catch (\SoapFault $e){
            $xml = $this->__getLastResponse();
            $xmlLimpo = CaracteresEspeciais::substituiCaractere($xml);
            $resultado = TratamentoXML::processaXmlTicketItem($xmlLimpo);
            return $resultado;
        }


    }

    //USADO PARA ATUALIZAR O BANCO DE DADOS QUANDO VAZIO
    public function ApiNovosTicket(string $dtaberturainicial){
        $request = $this->montaRequestDados();
        $request ->dados->dtabertura= $dtaberturainicial .";";
        $resultado= $this->obterLista($request);
        return $resultado;
    }


    // TESTE
    public function ApiObterClientes(){
        $request = $this->montaRequestDados();
        $request -> dados -> nomecompleto = "Aline";
        $result = $this->obterLista($request);
        return $result;
    }

}
