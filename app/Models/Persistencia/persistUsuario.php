<?php


namespace App\Models\Persistencia;


use App\Models\Entity\tbDepUsuarios;
use App\Models\Entity\tbUsuarios;
use Doctrine\ORM\EntityManagerInterface;

class persistUsuario
{
    private $em;
    private $codUsuario;
    private $codDepartamento;
    private $nome;
    private $sobrenome;
    private $nomeCompleto;
    private $hrregrapainel;
    private $gerente;
    private $ativo = 1;

    public function __construct(EntityManagerInterface $em, $codUsuario,$codDepartamento, $nome, $sobrenome, $nomeCompleto, $hrregrapainel, $gerente)
    {
        $this->em = $em;
        $this->codUsuario=$codUsuario;
        $this->codDepartamento = $codDepartamento;
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->nomeCompleto = $nomeCompleto;
        $this->hrregrapainel = $hrregrapainel;
        $this->gerente = $gerente;

    }


    public function criaUsuario()
    {

        $usuario = new tbUsuarios();
        $usuario->setCodusuario($this->codUsuario);
        $this->em->flush();
        $this->em->persist($usuario);
        $usuario->setCoddepartamentoint($this->em->getReference(tbDepUsuarios::class,(int)$this->codDepartamento));
        $usuario->setNome($this->nome);
        $usuario->setSobrenome($this->sobrenome);
        $usuario->setNomecompleto($this->nomeCompleto);
        $usuario->setHrregrapainelticket($this->hrregrapainel);
        $usuario->setGerente($this->gerente);
        $usuario->setAtivo($this->ativo);
        $usuario->setQtddiasatraso(null);
        $usuario->setMetahrconclticket(null);
        $this->em->flush();
        return $usuario;
    }


}
