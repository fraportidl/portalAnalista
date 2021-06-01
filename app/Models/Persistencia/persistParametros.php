<?php

namespace App\Models\Persistencia;

use App\Models\Entity\tbParametros;
use Doctrine\DBAL\Platforms\SQLServer2012Platform;
use Doctrine\DBAL\Types\DateTimeType;
use Doctrine\ORM\EntityManagerInterface;

class  persistParametros
{
    private $em;
    private $data;
    private $platform;
    /**
     * @var tbParametros $tab_parametros
     */
    private $tab_parametros;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->data = new DateTimeType();
        $this->platform = new SQLServer2012Platform;
        $this->tab_parametros= $this->em->find(tbParametros::class, 1);
    }

    public  function atualizadthrSinc()
    {

        $this->tab_parametros->setDthrSincronizacao($this->data->convertToPHPValue(date('Y-m-d H:i:s'), $this->platform));
        $this->em->flush();
    }

    public function atualizaParamRotinaConlusao($diasReenvio,$diasConclusao,$mensagemSaudacao, $mensagemReenvio, $mensagemReenvio2, $mensagemConclusao, $clienteNaoConclui){


        $this->tab_parametros->setDiasReenvioTicket($diasReenvio);
        $this->tab_parametros->setDiasConclusaoTicket($diasConclusao);
        $this->tab_parametros->setMensagemSaudacao($mensagemSaudacao);
        $this->tab_parametros->setMensagemReenvio($mensagemReenvio);
        $this->tab_parametros->setMensagemReenvio2($mensagemReenvio2);
        $this->tab_parametros->setMensagemConclusao($mensagemConclusao);
        $this->tab_parametros->setCodCliNconcl($clienteNaoConclui);
        $this->em->flush();

    }
}
