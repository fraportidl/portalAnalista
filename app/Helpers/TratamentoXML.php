<?php


namespace App\Helpers;


class TratamentoXML
{


    public static function processaXmlTicket($xmlLimpo)
    {

            $xml = simplexml_load_string($xmlLimpo);
            $dados = $xml->xpath('//return');
            $item = $xml->xpath('//item');
            $minhaStdClass = new \stdClass();
            $minhaStdClass->dados = $item;
            $minhaStdClass->statusRetorno =  $dados[0]->statusRetorno;
            return $minhaStdClass;
    }

    public static function processaXmlTicketItem($xmlLimpo)
    {

        $xml = simplexml_load_string($xmlLimpo);
        $dados = $xml->xpath('//return');
        $item = $xml->xpath('//item');
        $minhaStdClass = new \stdClass();
        $minhaStdClass->dados = $dados;
        $minhaStdClass->dados = new \stdClass();
        $minhaStdClass->dados->obterResultDadosInteracao = $item;
        $minhaStdClass->statusRetorno =  $dados[0]->statusRetorno;
        return $minhaStdClass;
    }

}
