<?php


namespace App\Models\Repository;


use App\Models\Entity\tbDepUsuarios;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping;

class RepTbDepUsuarios extends EntityRepository
{

    public function buscaDepartamentos($nomeDepartamento)
    {
        $tbDepUsuario = tbDepUsuarios::class;
      $dql = "SELECT d FROM $tbDepUsuario d
              WHERE d.nomedep <> '$nomeDepartamento'
              ORDER BY d.Id" ;
      $query = parent::getEntityManager()->createQuery($dql);
      return $query->getResult();

    }

    public function buscaDepartamento($nomeDepartamento)
    {
        $tbDepUsuario = tbDepUsuarios::class;
        $dql = "SELECT d FROM $tbDepUsuario d
              WHERE d.nomedep = '$nomeDepartamento'" ;
        $query = parent::getEntityManager()->createQuery($dql);
        return $query->getSingleResult();

    }
}
