<?php
namespace App\Models\Repository;

use App\Models\Entity\tbDepUsuarios;
use App\Models\Entity\tbUsuarios;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class RepTbUsuarios extends EntityRepository
{
    /**
     * @var EntityManagerInterface $em
     */
    private $em;
    private $tab_Usuarios;
    private $tab_DepUsuarios;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->tab_Usuarios = tbUsuarios::class;
        $this->tab_DepUsuarios = tbDepUsuarios::class;
    }

    public function Usuarios()
    {

        $dql = "SELECT u FROM $this->tab_Usuarios u
        WHERE u.coddepartamentoint = '1' and u.ativo = 1
        ORDER BY u.nome";
        $query = $this->em->createQuery($dql);
        $result = $query->getResult();
        return $result;
    }


    public function UsuariosXDepartamento($nomeDepartamento, $ativo)
    {
        $dql = "SELECT u FROM $this->tab_Usuarios u
        JOIN u.coddepartamentoint d
        WHERE d.nomedep = '$nomeDepartamento'
        AND u.ativo = $ativo
        ORDER BY u.nome";
        $query = $this->em->createQuery($dql);
        $result = $query->getResult();
        return $result;
    }

    public function Usuario($codUsuario)
    {
        $dql = "SELECT u FROM $this->tab_Usuarios u
        WHERE u.codusuario = $codUsuario";
        $query = $this->em->createQuery($dql);
        $result = $query->getArrayResult();
        return $result;
    }
}
