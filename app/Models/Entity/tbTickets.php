<?php

namespace App\Models\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;



/**
 * @Entity(repositoryClass="App\Models\Repository\RepTbTicket")
 */
class tbTickets
{
    /**
     * @Id
     * @Column (type = "integer", nullable = false)
     *
     */
    private $codticket;
    /**
     * @Column(type="integer", nullable = true)
     */
    private $coddepartamento;
     /**
     * @Column(type="integer", nullable = true)
     */
    private $codcategoria;
     /**
     * @Column(type="integer", nullable = true)
     */
    private $codclass;
     /**
     * @Column(type="integer", nullable = true)
     */
    private $codstatus;
    /**
     * @Column(type="string", nullable = true)
     */
    private $titulo;
    /**
     * @Column (type= "integer", nullable= true)
     */
    private $prioridade;
    /**
     * @Column(type="integer", nullable = true)
     */
    private $avaliacao;
     /**
     * @Column(type="integer", nullable = true)
     */
    private $bloqueado;
     /**
     * @Column(type="datetime", nullable = true)
     */
    private $dtabertura;
    /**
     * @Column(type="datetime", nullable = true)
     */
    private $dtalteracao;
    /**
     * @Column(type="datetime", nullable = true)
     */
    private $dtfechamento;
     /**
     * @Column(type="integer", nullable = true)
     */
    private $codcliente;
    /**
     * @Column(type="datetime", nullable = true)
     */
    private $dtleituracliente;
     /**
     * @OneToMany(targetEntity="tbTicketItens", mappedBy="codticket")
     * @var ArrayCollection|tbTicketItems[]
     */
    private $codticketitem;

    public function __construct()
    {
        $this->codticketitem = new ArrayCollection();
    }

    /**
     * @Column(type="datetime", nullable = true)
     */
    private $dthrreenvioticket;

    /**
     * @Column(type="datetime", nullable = true)
     */
    private $dthrreenvioticket2;


    /**
     * @ManyToOne(targetEntity="tbUsuarios", inversedBy="codticket")
     * @JoinColumn(referencedColumnName="codusuario")
     */
    private $codusuario;
    /**
     * @Column (type="integer", nullable = true)
     */
    private $concluidoautomaticamente;
    /**
     * @Column (type="datetime", nullable=true)
     */
    private $dtprevisao;

    /**
     * Get the value of dtprevisao
     */
    public function getDtprevisao()
    {
        return $this->dtprevisao;
    }

    /**
     * Set the value of dtprevisao
     *
     * @return  self
     */
    public function setDtprevisao($dtprevisao)
    {
        $this->dtprevisao = $dtprevisao;
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
    public function setCodticket($codticket)
    {
        $this->codticket = $codticket;

        return $this;
    }

    /**
     * Get the value of coddepartamento
     */
    public function getCoddepartamento()
    {
        return $this->coddepartamento;
    }

    /**
     * Set the value of coddepartamento
     *
     * @return  self
     */
    public function setCoddepartamento($coddepartamento)
    {
        $this->coddepartamento = $coddepartamento;

        return $this;
    }

    /**
     * Get the value of codcategoria
     */
    public function getCodcategoria()
    {
        return $this->codcategoria;
    }

    /**
     * Set the value of codcategoria
     *
     * @return  self
     */
    public function setCodcategoria($codcategoria)
    {
        $this->codcategoria = $codcategoria;

        return $this;
    }

    /**
     * Get the value of codclass
     */
    public function getCodclass()
    {
        return $this->codclass;
    }

    /**
     * Set the value of codclass
     *
     * @return  self
     */
    public function setCodclass($codclass)
    {
        $this->codclass = $codclass;

        return $this;
    }

    /**
     * Get the value of codstatus
     */
    public function getCodstatus()
    {
        return $this->codstatus;
    }

    /**
     * Set the value of codstatus
     *
     * @return  self
     */
    public function setCodstatus($codstatus)
    {
        $this->codstatus = $codstatus;

        return $this;
    }

    /**
     * Get the value of titulo
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }


    /**
     * Get the value of codusuario
     */
    public function getCodusuario():tbUsuarios
    {
        return $this->codusuario;
    }

    /**
     * Set the value of codusuario
     *
     * @return  self
     */
    public function setCodusuario( $codusuario)
    {
        $this->codusuario = $codusuario;

        return $this;
    }


    /**
     * Get the value of avaliacao
     */
    public function getAvaliacao()
    {
        return $this->avaliacao;
    }

    /**
     * Set the value of avaliacao
     *
     * @return  self
     */
    public function setAvaliacao($avaliacao)
    {
        $this->avaliacao = $avaliacao;

        return $this;
    }

    /**
     * Get the value of bloqueado
     */
    public function getBloqueado()
    {
        return $this->bloqueado;
    }

    /**
     * Set the value of bloqueado
     *
     * @return  self
     */
    public function setBloqueado($bloqueado)
    {
        $this->bloqueado = $bloqueado;

        return $this;
    }

    /**
     * Get the value of dtabertura
     */
    public function getDtabertura()
    {
        return $this->dtabertura;
    }

    /**
     * Set the value of dtabertura
     *
     * @return  self
     */
    public function setDtabertura($dtabertura)
    {
        $this->dtabertura = $dtabertura;

        return $this;
    }

    /**
     * Get the value of dtalteracao
     */
    public function getDtalteracao()
    {
        return $this->dtalteracao;
    }

    /**
     * Set the value of dtalteracao
     *
     * @return  self
     */
    public function setDtalteracao($dtalteracao)
    {
        $this->dtalteracao = $dtalteracao;

        return $this;
    }

    /**
     * Get the value of dtfechamento
     */
    public function getDtfechamento()
    {
        return $this->dtfechamento;
    }

    /**
     * Set the value of dtfechamento
     *
     * @return  self
     */
    public function setDtfechamento($dtfechamento)
    {
        $this->dtfechamento = $dtfechamento;

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

    /**
     * Get the value of dtleituracliente
     */
    public function getDtleituracliente()
    {
        return $this->dtleituracliente;
    }

    /**
     * Set the value of dtleituracliente
     *
     * @return  self
     */
    public function setDtleituracliente($dtleituracliente)
    {
        $this->dtleituracliente = $dtleituracliente;

        return $this;
    }

    public function addcodticketitem (tbTicketItens $codticketitem)
    {
        $this->codticketitem->add($codticketitem);
        $codticketitem->setCodticket($this);
        return $this;
    }

    public function getcodticketitem():Collection
    {
        return $this->codticketitem;
    }


    /**
     * Get the value of dthrreenvioticket
     */
    public function getDthrreenvioticket()
    {
        return $this->dthrreenvioticket;
    }

    /**
     * Set the value of dthrreenvioticket
     *
     * @return  self
     */
    public function setDthrreenvioticket($dthrreenvioticket)
    {
        $this->dthrreenvioticket = $dthrreenvioticket;

        return $this;
    }

    /**
     * Get the value of dthrreenvioticket2
     */
    public function getDthrreenvioticket2()
    {
        return $this->dthrreenvioticket2;
    }

    /**
     * Set the value of dthrreenvioticket2
     *
     * @return  self
     */
    public function setDthrreenvioticket2($dthrreenvioticket2)
    {
        $this->dthrreenvioticket2 = $dthrreenvioticket2;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getConcluidoautomaticamente()
    {
        return $this->concluidoautomaticamente;
    }

    /**
     * @param mixed $concluidoautomaticamente
     * @return tbTickets
     */
    public function setConcluidoautomaticamente($concluidoautomaticamente)
    {
        $this->concluidoautomaticamente = $concluidoautomaticamente;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrioridade()
    {
        return $this->prioridade;
    }

    /**
     * @param mixed $prioridade
     * @return tbTickets
     */
    public function setPrioridade($prioridade)
    {
        $this->prioridade = $prioridade;
        return $this;
    }


}
