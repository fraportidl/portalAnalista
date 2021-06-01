<?php
namespace App\Models\Entity;


/**
 * @Entity(repositoryClass="App\Models\Repository\RepTbParametros")
 */
class tbParametros
{
    /**
     * @Id
     * @Column (type = "integer", nullable = false)
     * @GeneratedValue
     */
    private $Id;
    /**
     * @Column (type = "datetime", nullable = false)
     */
    private $dthrSincronizacao;

    /**
     * @Column (type = "integer", nullable = true)
     */
    private $diasReenvioTicket;

    /**
     * @Column (type = "integer", nullable = true)
     */
    private $diasConclusaoTicket;

    /**
     * @Column(type="text", nullable = true)
     */
    private $mensagemReenvio;

    /**
     * @Column(type="text", nullable = true)
     */
    private $mensagemReenvio2;

    /**
     * @Column(type="text", nullable = true)
     */
    private $mensagemConclusao;

        /**
     * @Column(type="string", nullable = true)
     */
    private $codCliNconcl;

    /**
     * @Column(type="text", nullable = true)
     */
    private $mensagemSaudacao;

    /**
     * @Column(type="text", nullable = true)
     */
    private $mensagemSaudacaoPosExp;

    /**
     * Get the value of Id
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * Set the value of Id
     *
     * @return  self
     */
    public function setId($Id)
    {
        $this->Id = $Id;

        return $this;
    }

    /**
     * Get the value of dthrSincronizacao
     */
    public function getDthrSincronizacao()
    {
        return $this->dthrSincronizacao;
    }

    /**
     * Set the value of dthrSincronizacao
     *
     * @return  self
     */
    public function setDthrSincronizacao($dthrSincronizacao)
    {
        $this->dthrSincronizacao = $dthrSincronizacao;

        return $this;
    }

    /**
     * Get the value of tempoReenvioTicket
     */
    public function getDiasReenvioTicket()
    {
        return $this->diasReenvioTicket;
    }

    /**
     * Set the value of tempoReenvioTicket
     *
     * @return  self
     */
    public function setDiasReenvioTicket($diasReenvioTicket)
    {
        $this->diasReenvioTicket = $diasReenvioTicket;

        return $this;
    }

    /**
     * Get the value of tempoConclusaoTicket
     */
    public function getDiasConclusaoTicket()
    {
        return $this->diasConclusaoTicket;
    }

    /**
     * Set the value of tempoConclusaoTicket
     *
     * @return  self
     */
    public function setDiasConclusaoTicket($diasConclusaoTicket)
    {
        $this->diasConclusaoTicket = $diasConclusaoTicket;

        return $this;
    }

    /**
     * Get the value of mensagemReenvio
     */
    public function getMensagemReenvio()
    {
        return $this->mensagemReenvio;
    }

    /**
     * Set the value of mensagemReenvio
     *
     * @return  self
     */
    public function setMensagemReenvio($mensagemReenvio)
    {
        $this->mensagemReenvio = $mensagemReenvio;

        return $this;
    }

    /**
     * Get the value of mensagemConclusao
     */
    public function getMensagemConclusao()
    {
        return $this->mensagemConclusao;
    }

    /**
     * Set the value of mensagemConclusao
     *
     * @return  self
     */
    public function setMensagemConclusao($mensagemConclusao)
    {
        $this->mensagemConclusao = $mensagemConclusao;

        return $this;
    }

    /**
     * Get the value of codCliNconcl
     */
    public function getCodCliNconcl()
    {
        return $this->codCliNconcl;
    }

    /**
     * Set the value of codCliNconcl
     *
     * @return  self
     */
    public function setCodCliNconcl($codCliNconcl)
    {
        $this->codCliNconcl = $codCliNconcl;

        return $this;
    }

    /**
     * Get the value of mensagemReenvio2
     */
    public function getMensagemReenvio2()
    {
        return $this->mensagemReenvio2;
    }

    /**
     * Set the value of mensagemReenvio2
     *
     * @return  self
     */
    public function setMensagemReenvio2($mensagemReenvio2)
    {
        $this->mensagemReenvio2 = $mensagemReenvio2;

        return $this;
    }

    /**
     * Get the value of mensagemSaudacao
     */
    public function getMensagemSaudacao()
    {
        return $this->mensagemSaudacao;
    }

    /**
     * Set the value of mensagemSaudacao
     *
     * @return  self
     */
    public function setMensagemSaudacao($mensagemSaudacao)
    {
        $this->mensagemSaudacao = $mensagemSaudacao;
        return $this;
    }

    /**
     * Get the value of mensagemSaudacaoPosExp
     */
    public function getmensagemSaudacaoPosExp()
    {
        return $this->mensagemSaudacaoPosExp;
    }

    /**
     * Set the value of mensagemSaudacaoPosExp
     *
     * @return  self
     */
    public function setmensagemSaudacaoPosExp($mensagemSaudacaoPosExp)
    {
        $this->mensagemSaudacaoPosExp = $mensagemSaudacaoPosExp;
        return $this;
    }


}
