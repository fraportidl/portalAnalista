<?php

namespace DoctrineProxies\__CG__\App\Models\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class tbTickets extends \App\Models\Entity\tbTickets implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array<string, null> properties to be lazy loaded, indexed by property name
     */
    public static $lazyPropertiesNames = array (
);

    /**
     * @var array<string, mixed> default values of properties to be lazy loaded, with keys being the property names
     *
     * @see \Doctrine\Common\Proxy\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array (
);



    public function __construct(?\Closure $initializer = null, ?\Closure $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'App\\Models\\Entity\\tbTickets' . "\0" . 'codticket', '' . "\0" . 'App\\Models\\Entity\\tbTickets' . "\0" . 'coddepartamento', '' . "\0" . 'App\\Models\\Entity\\tbTickets' . "\0" . 'codcategoria', '' . "\0" . 'App\\Models\\Entity\\tbTickets' . "\0" . 'codclass', '' . "\0" . 'App\\Models\\Entity\\tbTickets' . "\0" . 'codstatus', '' . "\0" . 'App\\Models\\Entity\\tbTickets' . "\0" . 'titulo', '' . "\0" . 'App\\Models\\Entity\\tbTickets' . "\0" . 'prioridade', '' . "\0" . 'App\\Models\\Entity\\tbTickets' . "\0" . 'avaliacao', '' . "\0" . 'App\\Models\\Entity\\tbTickets' . "\0" . 'bloqueado', '' . "\0" . 'App\\Models\\Entity\\tbTickets' . "\0" . 'dtabertura', '' . "\0" . 'App\\Models\\Entity\\tbTickets' . "\0" . 'dtalteracao', '' . "\0" . 'App\\Models\\Entity\\tbTickets' . "\0" . 'dtfechamento', '' . "\0" . 'App\\Models\\Entity\\tbTickets' . "\0" . 'codcliente', '' . "\0" . 'App\\Models\\Entity\\tbTickets' . "\0" . 'dtleituracliente', '' . "\0" . 'App\\Models\\Entity\\tbTickets' . "\0" . 'codticketitem', '' . "\0" . 'App\\Models\\Entity\\tbTickets' . "\0" . 'dthrreenvioticket', '' . "\0" . 'App\\Models\\Entity\\tbTickets' . "\0" . 'dthrreenvioticket2', '' . "\0" . 'App\\Models\\Entity\\tbTickets' . "\0" . 'codusuario', '' . "\0" . 'App\\Models\\Entity\\tbTickets' . "\0" . 'concluidoautomaticamente'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Models\\Entity\\tbTickets' . "\0" . 'codticket', '' . "\0" . 'App\\Models\\Entity\\tbTickets' . "\0" . 'coddepartamento', '' . "\0" . 'App\\Models\\Entity\\tbTickets' . "\0" . 'codcategoria', '' . "\0" . 'App\\Models\\Entity\\tbTickets' . "\0" . 'codclass', '' . "\0" . 'App\\Models\\Entity\\tbTickets' . "\0" . 'codstatus', '' . "\0" . 'App\\Models\\Entity\\tbTickets' . "\0" . 'titulo', '' . "\0" . 'App\\Models\\Entity\\tbTickets' . "\0" . 'prioridade', '' . "\0" . 'App\\Models\\Entity\\tbTickets' . "\0" . 'avaliacao', '' . "\0" . 'App\\Models\\Entity\\tbTickets' . "\0" . 'bloqueado', '' . "\0" . 'App\\Models\\Entity\\tbTickets' . "\0" . 'dtabertura', '' . "\0" . 'App\\Models\\Entity\\tbTickets' . "\0" . 'dtalteracao', '' . "\0" . 'App\\Models\\Entity\\tbTickets' . "\0" . 'dtfechamento', '' . "\0" . 'App\\Models\\Entity\\tbTickets' . "\0" . 'codcliente', '' . "\0" . 'App\\Models\\Entity\\tbTickets' . "\0" . 'dtleituracliente', '' . "\0" . 'App\\Models\\Entity\\tbTickets' . "\0" . 'codticketitem', '' . "\0" . 'App\\Models\\Entity\\tbTickets' . "\0" . 'dthrreenvioticket', '' . "\0" . 'App\\Models\\Entity\\tbTickets' . "\0" . 'dthrreenvioticket2', '' . "\0" . 'App\\Models\\Entity\\tbTickets' . "\0" . 'codusuario', '' . "\0" . 'App\\Models\\Entity\\tbTickets' . "\0" . 'concluidoautomaticamente'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (tbTickets $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy::$lazyPropertiesDefaults as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @deprecated no longer in use - generated code now relies on internal components rather than generated public API
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getCodticket()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getCodticket();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCodticket', []);

        return parent::getCodticket();
    }

    /**
     * {@inheritDoc}
     */
    public function setCodticket($codticket)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCodticket', [$codticket]);

        return parent::setCodticket($codticket);
    }

    /**
     * {@inheritDoc}
     */
    public function getCoddepartamento()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCoddepartamento', []);

        return parent::getCoddepartamento();
    }

    /**
     * {@inheritDoc}
     */
    public function setCoddepartamento($coddepartamento)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCoddepartamento', [$coddepartamento]);

        return parent::setCoddepartamento($coddepartamento);
    }

    /**
     * {@inheritDoc}
     */
    public function getCodcategoria()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCodcategoria', []);

        return parent::getCodcategoria();
    }

    /**
     * {@inheritDoc}
     */
    public function setCodcategoria($codcategoria)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCodcategoria', [$codcategoria]);

        return parent::setCodcategoria($codcategoria);
    }

    /**
     * {@inheritDoc}
     */
    public function getCodclass()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCodclass', []);

        return parent::getCodclass();
    }

    /**
     * {@inheritDoc}
     */
    public function setCodclass($codclass)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCodclass', [$codclass]);

        return parent::setCodclass($codclass);
    }

    /**
     * {@inheritDoc}
     */
    public function getCodstatus()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCodstatus', []);

        return parent::getCodstatus();
    }

    /**
     * {@inheritDoc}
     */
    public function setCodstatus($codstatus)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCodstatus', [$codstatus]);

        return parent::setCodstatus($codstatus);
    }

    /**
     * {@inheritDoc}
     */
    public function getTitulo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTitulo', []);

        return parent::getTitulo();
    }

    /**
     * {@inheritDoc}
     */
    public function setTitulo($titulo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTitulo', [$titulo]);

        return parent::setTitulo($titulo);
    }

    /**
     * {@inheritDoc}
     */
    public function getCodusuario(): \App\Models\Entity\tbUsuarios
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCodusuario', []);

        return parent::getCodusuario();
    }

    /**
     * {@inheritDoc}
     */
    public function setCodusuario($codusuario)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCodusuario', [$codusuario]);

        return parent::setCodusuario($codusuario);
    }

    /**
     * {@inheritDoc}
     */
    public function getAvaliacao()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAvaliacao', []);

        return parent::getAvaliacao();
    }

    /**
     * {@inheritDoc}
     */
    public function setAvaliacao($avaliacao)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAvaliacao', [$avaliacao]);

        return parent::setAvaliacao($avaliacao);
    }

    /**
     * {@inheritDoc}
     */
    public function getBloqueado()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBloqueado', []);

        return parent::getBloqueado();
    }

    /**
     * {@inheritDoc}
     */
    public function setBloqueado($bloqueado)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBloqueado', [$bloqueado]);

        return parent::setBloqueado($bloqueado);
    }

    /**
     * {@inheritDoc}
     */
    public function getDtabertura()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDtabertura', []);

        return parent::getDtabertura();
    }

    /**
     * {@inheritDoc}
     */
    public function setDtabertura($dtabertura)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDtabertura', [$dtabertura]);

        return parent::setDtabertura($dtabertura);
    }

    /**
     * {@inheritDoc}
     */
    public function getDtalteracao()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDtalteracao', []);

        return parent::getDtalteracao();
    }

    /**
     * {@inheritDoc}
     */
    public function setDtalteracao($dtalteracao)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDtalteracao', [$dtalteracao]);

        return parent::setDtalteracao($dtalteracao);
    }

    /**
     * {@inheritDoc}
     */
    public function getDtfechamento()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDtfechamento', []);

        return parent::getDtfechamento();
    }

    /**
     * {@inheritDoc}
     */
    public function setDtfechamento($dtfechamento)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDtfechamento', [$dtfechamento]);

        return parent::setDtfechamento($dtfechamento);
    }

    /**
     * {@inheritDoc}
     */
    public function getCodcliente()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCodcliente', []);

        return parent::getCodcliente();
    }

    /**
     * {@inheritDoc}
     */
    public function setCodcliente($codcliente)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCodcliente', [$codcliente]);

        return parent::setCodcliente($codcliente);
    }

    /**
     * {@inheritDoc}
     */
    public function getDtleituracliente()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDtleituracliente', []);

        return parent::getDtleituracliente();
    }

    /**
     * {@inheritDoc}
     */
    public function setDtleituracliente($dtleituracliente)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDtleituracliente', [$dtleituracliente]);

        return parent::setDtleituracliente($dtleituracliente);
    }

    /**
     * {@inheritDoc}
     */
    public function addcodticketitem(\App\Models\Entity\tbTicketItens $codticketitem)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addcodticketitem', [$codticketitem]);

        return parent::addcodticketitem($codticketitem);
    }

    /**
     * {@inheritDoc}
     */
    public function getcodticketitem(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getcodticketitem', []);

        return parent::getcodticketitem();
    }

    /**
     * {@inheritDoc}
     */
    public function getDthrreenvioticket()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDthrreenvioticket', []);

        return parent::getDthrreenvioticket();
    }

    /**
     * {@inheritDoc}
     */
    public function setDthrreenvioticket($dthrreenvioticket)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDthrreenvioticket', [$dthrreenvioticket]);

        return parent::setDthrreenvioticket($dthrreenvioticket);
    }

    /**
     * {@inheritDoc}
     */
    public function getDthrreenvioticket2()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDthrreenvioticket2', []);

        return parent::getDthrreenvioticket2();
    }

    /**
     * {@inheritDoc}
     */
    public function setDthrreenvioticket2($dthrreenvioticket2)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDthrreenvioticket2', [$dthrreenvioticket2]);

        return parent::setDthrreenvioticket2($dthrreenvioticket2);
    }

    /**
     * {@inheritDoc}
     */
    public function getConcluidoautomaticamente()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getConcluidoautomaticamente', []);

        return parent::getConcluidoautomaticamente();
    }

    /**
     * {@inheritDoc}
     */
    public function setConcluidoautomaticamente($concluidoautomaticamente)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setConcluidoautomaticamente', [$concluidoautomaticamente]);

        return parent::setConcluidoautomaticamente($concluidoautomaticamente);
    }

    /**
     * {@inheritDoc}
     */
    public function getPrioridade()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPrioridade', []);

        return parent::getPrioridade();
    }

    /**
     * {@inheritDoc}
     */
    public function setPrioridade($prioridade)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPrioridade', [$prioridade]);

        return parent::setPrioridade($prioridade);
    }

}
