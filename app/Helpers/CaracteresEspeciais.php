<?php


namespace App\Helpers;


class CaracteresEspeciais
{
    public static function substituiCaractere($texto):String
    {
        $stringSaida = '';
        for ($j=0; $j<strlen($texto); $j++){
            $numCaractereAscii = ord($texto[$j]);
            if($numCaractereAscii >= 31){
                $stringSaida .= $texto[$j];
            }
        }
        return $stringSaida;
    }
}
