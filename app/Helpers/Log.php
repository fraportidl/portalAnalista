<?php
namespace App\Helpers;

class Log 
{
    public static function GeraLog($nomeArquivo, $textoLog, $apagaLog){
        
        $parametroLog = "a+";
        if ($apagaLog == "sim"){$parametroLog = "w+";};
        $nomeArquivoLog = __DIR__. '\Logs\\'.$nomeArquivo.'.txt' ;
        // $local = __DIR__. '\..\..\Helpers\LogApi\logrequest.txt';
        //Variável $fp armazena a conexão com o arquivo e o tipo de ação.
        $conexao = fopen($nomeArquivoLog, $parametroLog);
        //Escreve no arquivo aberto.
        $texto = "{$textoLog} \r\n";
        fwrite($conexao, $texto);    
        //Fecha o arquivo.
        fclose($conexao);
     }
    
}
