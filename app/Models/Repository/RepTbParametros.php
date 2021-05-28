<?php
namespace App\Models\Repository;

use App\Models\Entity\tbParametros;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;

class RepTbParametros extends EntityRepository
{
    private $em;
    private $tab_parametros;
    function __construct(EntityManagerInterface $em, ClassMetadata $class)
    {
        parent::__construct($em,$class);
        $this->em = $em;
        $this->tab_parametros = tbParametros::class;
    }


    public function buscaParametros()
    {
        $dql = "Select p from
        $this->tab_parametros p";
        $query = $this->em->createQuery($dql);
        return $query->getArrayResult();

    }


}
