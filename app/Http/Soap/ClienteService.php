<?php
namespace App\Http\Soap;
use \stdClass;
use \SoapClient;

class ClienteService extends SoapClient
{
    protected $sigla = "bti";
    protected $servicekey;
    protected $teste;

    public function __construct($senhaservice, $tipoRequest)
    {
        $sigla = $this->sigla;
        $servicekeywsdl = md5($sigla . $senhaservice);
        $this->servicekey = md5($sigla . $senhaservice . date("Ymd"));
        //$wsdl = "http://www.mysuite1.com.br/empresas/{$sigla}/webservices/formulariohelpdesk.php?wsdl&sigla={$sigla}&servicekeywsdl={$servicekeywsdl}";
        $wsdl = "http://www.mysuite1.com.br/empresas/{$sigla}/webservices/{$tipoRequest}.php?wsdl&sigla={$sigla}&servicekeywsdl={$servicekeywsdl}";
        $this->teste = $wsdl;
        //parent::__construct($wsdl,  array("trace" => 1));
        parent::__construct($wsdl,  array("trace" => 1,"encoding" => "UTF-8" ));
    }


/*   public function __doRequest( $request, $location, $action, $version, $oneWay = 0 ) {

        global $namespace;

        // Here we remove the ns1: prefix and remove the xmlns attribute from the XML envelope.
       $request = $this->clean_string($request);
        return parent::__doRequest( $request, $location, $action, $version, $oneWay = 0 );

    }*/

    protected function montaRequestDados(){
        $request = new stdClass();
        $request->sigla = $this->sigla;
        $request->servicekey = $this->servicekey;
        $request->dados = new stdClass();
        return $request;
    }

    private  function clean_string($string) {
        $s = trim($string);
        $s = iconv("UTF-8", "UTF-8//IGNORE", $s); // drop all non utf-8 characters

        // this is some bad utf-8 byte sequence that makes mysql complain - control and formatting i think
        $s = preg_replace('/(?>[\x00-\x1F]|\xC2[\x80-\x9F]|\xE2[\x80-\x8F]{2}|\xE2\x80[\xA4-\xA8]|\xE2\x81[\x9F-\xAF])/', ' ', $s);

        // $s = preg_replace('/\s+/', ' ', $s); // reduce all multiple whitespace to a single space

        return $s;
    }
    public  function teste()
    {
        return $this->teste;
    }
}
