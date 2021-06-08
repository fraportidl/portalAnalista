<?php
namespace App\Helpers;

use DateTime;
use Doctrine\DBAL\Platforms\SQLServer2012Platform;
use Doctrine\DBAL\Types\DateTimeType;
use phpDocumentor\Reflection\Types\This;


class  Datas
{

    public static function calculaDiffdata($data)
    {
        $datahj = new DateTime('now');
        $dataAnterior = new DateTime($data);
        $diffDatas = $datahj->diff($dataAnterior);
        return $diffDatas;
    }

    public static function converteDataEmMinutos($data)
    {
        $minutos = $data->days * 24 * 60;
        $minutos += $data->h * 60;
        $minutos += $data->i;
        return $minutos;
    }

    public static function horaParaMinutos($hora){
        $partes = explode(":", $hora);
        $minutos = $partes[0]*60+$partes[1];
        return ($minutos);
    }

    public static function converteDataIntEmDataBanco (int $dataInt, $platform){
        $dateTime = new DateTimeType();
        $Data = $dateTime->convertToPHPValue(Date('Y-m-d H:i:s',$dataInt),$platform);
        return $Data;
    }

    public static function converteDataIntEmDataStringMais1hora(int $dataInt){
        $dataString = date('Y/m/d H:i:s',$dataInt);
        $dataMais1Hora = date('Y/m/d H:i:s', strtotime($dataString.'+1 hours'));
        //$Data = Date('Y/m/d H:i:s',$dataInt);
        //$DataString = date_format($Data, 'Y/m/d H:i:s');
        return $dataMais1Hora;
    }
}
