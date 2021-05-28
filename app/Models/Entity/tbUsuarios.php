<?php
namespace App\Models\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Models\Entity\tbDepUsuarios;


/**
 * @Entity(repositoryClass="App\Models\Repository\RepTbUsuarios")
 */
class tbUsuarios
{
    /**
     * @Id
     * @Column (type="integer", nullable = false)
     */
    private $codusuario;
    /**
     * @Column(type="string")
     */
    private $nomecompleto;
    /**
     * @Column (type="string")
     */
    private $nome;
    /**
     * @Column (type="string")
     */
    private $sobrenome;
      /**
     * @var tbDepUsuarios
     * @ManyToOne(targetEntity="tbDepUsuarios",inversedBy="codusuario")
     * @JoinColumn(referencedColumnName="Id")
     */
    private $coddepartamentoint;
    /**
     * @Column (type="time", nullable = true)
     */
    private $hrregrapainelticket;
    /**
     * @Column (type="integer", nullable = true)
     */
    private $qtddiasatraso;
    /**
     * @Column (type="time", nullable = true)
     */
    private $metahrconclticket;
    /**
     * @Column (type="string")
     */
    private $ativo;

    /**
     * @OneToMany(targetEntity="tbTickets", mappedBy="codusuario")
     * @var ArrayCollection|tbTicket[]
     */
    private $codticket;

    public function __construct()
    {
        $this->codticket = new ArrayCollection();
    }


    /**
     * @Column (type="integer", nullable = true)
     */
    private $gerente;

    public function setcodticket (tbTickets $codticket)
    {
        $this->codticket->add($codticket);
        $codticket->setCodusuario($this);
        return $this;
    }

    public function getCodticket():Collection
    {
        return $this->codticket;
    }

    /**
     * Get the value of codusuario
     */
    public function getCodusuario()
    {
        return $this->codusuario;
    }

    /**
     * Set the value of codusuario
     *
     * @return  self
     */
    public function setCodusuario($codusuario)
    {
        $this->codusuario = $codusuario;

        return $this;
    }

    /**
     * Get the value of nomecompleto
     */
    public function getNomecompleto()
    {
        return $this->nomecompleto;
    }

    /**
     * Set the value of nomecompleto
     *
     * @return  self
     */
    public function setNomecompleto($nomecompleto)
    {
        $this->nomecompleto = $nomecompleto;

        return $this;
    }

    /**
     * Get the value of nome
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of sobrenome
     */
    public function getSobrenome()
    {
        return $this->sobrenome;
    }

    /**
     * Set the value of sobrenome
     *
     * @return  self
     */
    public function setSobrenome($sobrenome)
    {
        $this->sobrenome = $sobrenome;

        return $this;
    }

    /**
     * Get the value of coddepartamentoint
     */
    public function getCoddepartamentoint()
    {

        return $this->coddepartamentoint;
    }

    /**
     * Set the value of coddepartamentoint
     *
     * @return  self
     */
    public function setCoddepartamentoint($coddepartamentoint)
    {
        $this->coddepartamentoint = $coddepartamentoint;

        return $this;
    }

    /**
     * Get the value of hrregrapainelticket
     */
    public function getHrregrapainelticket()
    {
        return $this->hrregrapainelticket;
    }

    /**
     * Set the value of hrregrapainelticket
     *
     * @return  self
     */
    public function setHrregrapainelticket($hrregrapainelticket)
    {
        $this->hrregrapainelticket = $hrregrapainelticket;

        return $this;
    }

    /**
     * Get the value of qtddiasatraso
     */
    public function getQtddiasatraso()
    {
        return $this->qtddiasatraso;
    }

    /**
     * Set the value of qtddiasatraso
     *
     * @return  self
     */
    public function setQtddiasatraso($qtddiasatraso)
    {
        $this->qtddiasatraso = $qtddiasatraso;

        return $this;
    }

    /**
     * Get the value of metahrconclticket
     */
    public function getMetahrconclticket()
    {
        return $this->metahrconclticket;
    }

    /**
     * Set the value of metahrconclticket
     *
     * @return  self
     */
    public function setMetahrconclticket($metahrconclticket)
    {
        $this->metahrconclticket = $metahrconclticket;

        return $this;
    }

    /**
     * Get the value of ativo
     */
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * Set the value of ativo
     *
     * @return  self
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }



    /**
     * Get the value of gerente
     */
    public function getGerente()
    {
        return $this->gerente;
    }

    /**
     * Set the value of gerente
     *
     * @return  self
     */
    public function setGerente($gerente)
    {
        $this->gerente = $gerente;

        return $this;
    }
}
