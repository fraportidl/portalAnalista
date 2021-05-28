<?php
namespace App\Models\Entity;



use App\Models\Entity\tbTickets;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity (repositoryClass="App\Models\Repository\RepTbTicketItens")
 */
class tbTicketItens
{
    /**
     * @Id
     * @Column (type="integer", nullable = false)
     */
    private $codticketitem;
    /**
     * @var tbTickets
     * @ManyToOne(targetEntity="tbTickets", inversedBy="codticketitem")
     * @JoinColumn(referencedColumnName="codticket")
     */
    private $codticket;
    /**
     * @Column(type="integer", nullable = false)
     */
    private $privado;
    /**
     * @Column(type="datetime", nullable = false)
     */
    private $dtitem;
    /**
     * @Column(type="integer", nullable = false)
     */
    private $codusuario;
    /**
     * @Column(type="string", nullable = false)
     */
    private $nomeoperador;
    /**
     * @Column(type="integer", nullable = true)
     */
    private $codigooriginalusuario;
    /**
     * @Column(type="string", nullable = true)
     */
    private $nomecliente;
    /**
     * @Column(type="text", nullable = true)
     */
    private $descricao;
    /**
     * @Column(type="integer", nullable = true)
     */
    private $codform;
    /**
     * @Column(type="integer", nullable = true)
     */
    private $codcliente;




    /**
     * Get the value of codticketitem
     */
    public function getCodticketitem()
    {
        return $this->codticketitem;
    }

    /**
     * Set the value of codticketitem
     *
     * @return  self
     */
    public function setCodticketitem($codticketitem)
    {
        $this->codticketitem = $codticketitem;

        return $this;
    }

    /**
     * Get the value of codticket
     */
    public function getCodticket()
    {
        return $this->codticket;
    }

    /**
     * Set the value of codticket
     *
     * @return  self
     */
    public function setCodticket( $codticket)
    {
        $this->codticket = $codticket;

        return $this;
    }

    /**
     * Get the value of privado
     */
    public function getPrivado()
    {
        return $this->privado;
    }

    /**
     * Set the value of privado
     *
     * @return  self
     */
    public function setPrivado($privado)
    {
        $this->privado = $privado;

        return $this;
    }

    /**
     * Get the value of dtitem
     */
    public function getDtitem()
    {
        return $this->dtitem;
    }

    /**
     * Set the value of dtitem
     *
     * @return  self
     */
    public function setDtitem($dtitem)
    {
        $this->dtitem = $dtitem;

        return $this;
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
     * Get the value of nomeoperador
     */
    public function getNomeoperador()
    {
        return $this->nomeoperador;
    }

    /**
     * Set the value of nomeoperador
     *
     * @return  self
     */
    public function setNomeoperador($nomeoperador)
    {
        $this->nomeoperador = $nomeoperador;

        return $this;
    }

    /**
     * Get the value of codigooriginalusuario
     */
    public function getCodigooriginalusuario()
    {
        return $this->codigooriginalusuario;
    }

    /**
     * Set the value of codigooriginalusuario
     *
     * @return  self
     */
    public function setCodigooriginalusuario($codigooriginalusuario)
    {
        $this->codigooriginalusuario = $codigooriginalusuario;

        return $this;
    }

    /**
     * Get the value of nomecliente
     */
    public function getNomecliente()
    {
        return $this->nomecliente;
    }

    /**
     * Set the value of nomecliente
     *
     * @return  self
     */
    public function setNomecliente($nomecliente)
    {
        $this->nomecliente = $nomecliente;

        return $this;
    }

    /**
     * Get the value of descricao
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     *
     * @return  self
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get the value of codform
     */
    public function getCodform()
    {
        return $this->codform;
    }

    /**
     * Set the value of codform
     *
     * @return  self
     */
    public function setCodform($codform)
    {
        $this->codform = $codform;

        return $this;
    }

    /**
     * Get the value of codcliente
     */
    public function getCodcliente()
    {
        return $this->codcliente;
    }

    /**
     * Set the value of codcliente
     *
     * @return  self
     */
    public function setCodcliente($codcliente)
    {
        $this->codcliente = $codcliente;

        return $this;
    }
}
