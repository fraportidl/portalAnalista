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
    private $ativo;
    private $imagem;

    public function __construct(EntityManagerInterface $em, $codUsuario,$codDepartamento, $nome, $sobrenome, $nomeCompleto, $hrregrapainel, $gerente,$ativo,$imagem)
    {
        $this->em = $em;
        $this->codUsuario=$codUsuario;
        $this->codDepartamento = $codDepartamento;
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->nomeCompleto = $nomeCompleto;
        $this->hrregrapainel = $hrregrapainel;
        $this->gerente = $gerente;
        $this->ativo = $ativo;
        $this->imagem=$imagem;

    }


    public function criaUsuario()
    {

        $usuario = new tbUsuarios();
        $usuario->setCodusuario($this->codUsuario);
        $this->em->flush();
        $this->em->persist($usuario);
        $novoUsuario = $this->setaValoresUsuario($usuario);
        return $novoUsuario;

    }

    public function alteraUsuario()
    {
        $usuario = $this->em->find(tbUsuarios::class,$this->codUsuario);
        $usuarioAlterado = $this->setaValoresUsuario($usuario);
        return $usuarioAlterado;
    }

    private function setaValoresUsuario($usuario){
        $usuario->setCoddepartamentoint($this->em->getReference(tbDepUsuarios::class,(int)$this->codDepartamento));
        $usuario->setNome($this->nome);
        $usuario->setSobrenome($this->sobrenome);
        $usuario->setNomecompleto($this->nomeCompleto);
        $usuario->setHrregrapainelticket($this->hrregrapainel);
        $usuario->setGerente($this->gerente);
        $usuario->setAtivo((int)$this->ativo);
        $usuario->setQtddiasatraso(null);
        $usuario->setMetahrconclticket(null);
        $usuario->setImagem($this->imagem);
        $this->em->flush();
        return $usuario;
    }

}
