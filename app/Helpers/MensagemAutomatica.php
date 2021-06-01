<?php


namespace App\Helpers;


class MensagemAutomatica
{
    public static function criaMensagem($nomeCliente, $mensagem, $nomeOperador)
    {
        $texto = "Olá {$nomeCliente}, <br />{$mensagem} <br /> <br /> Atenciosamente, <br/> {$nomeOperador} <br /> <br /> -----<b>Está é uma mensagem automática</b>-----";
        return $texto;
    }
}
