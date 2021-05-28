<?php

namespace DoctrineProxies\__CG__\App\Models\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class tbTicketItens extends \App\Models\Entity\tbTicketItens implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'App\\Models\\Entity\\tbTicketItens' . "\0" . 'codticketitem', '' . "\0" . 'App\\Models\\Entity\\tbTicketItens' . "\0" . 'codticket', '' . "\0" . 'App\\Models\\Entity\\tbTicketItens' . "\0" . 'privado', '' . "\0" . 'App\\Models\\Entity\\tbTicketItens' . "\0" . 'dtitem', '' . "\0" . 'App\\Models\\Entity\\tbTicketItens' . "\0" . 'codusuario', '' . "\0" . 'App\\Models\\Entity\\tbTicketItens' . "\0" . 'nomeoperador', '' . "\0" . 'App\\Models\\Entity\\tbTicketItens' . "\0" . 'codigooriginalusuario', '' . "\0" . 'App\\Models\\Entity\\tbTicketItens' . "\0" . 'nomecliente', '' . "\0" . 'App\\Models\\Entity\\tbTicketItens' . "\0" . 'descricao', '' . "\0" . 'App\\Models\\Entity\\tbTicketItens' . "\0" . 'codform', '' . "\0" . 'App\\Models\\Entity\\tbTicketItens' . "\0" . 'codcliente'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Models\\Entity\\tbTicketItens' . "\0" . 'codticketitem', '' . "\0" . 'App\\Models\\Entity\\tbTicketItens' . "\0" . 'codticket', '' . "\0" . 'App\\Models\\Entity\\tbTicketItens' . "\0" . 'privado', '' . "\0" . 'App\\Models\\Entity\\tbTicketItens' . "\0" . 'dtitem', '' . "\0" . 'App\\Models\\Entity\\tbTicketItens' . "\0" . 'codusuario', '' . "\0" . 'App\\Models\\Entity\\tbTicketItens' . "\0" . 'nomeoperador', '' . "\0" . 'App\\Models\\Entity\\tbTicketItens' . "\0" . 'codigooriginalusuario', '' . "\0" . 'App\\Models\\Entity\\tbTicketItens' . "\0" . 'nomecliente', '' . "\0" . 'App\\Models\\Entity\\tbTicketItens' . "\0" . 'descricao', '' . "\0" . 'App\\Models\\Entity\\tbTicketItens' . "\0" . 'codform', '' . "\0" . 'App\\Models\\Entity\\tbTicketItens' . "\0" . 'codcliente'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (tbTicketItens $proxy) {
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
    public function getCodticketitem()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getCodticketitem();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCodticketitem', []);

        return parent::getCodticketitem();
    }

    /**
     * {@inheritDoc}
     */
    public function setCodticketitem($codticketitem)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCodticketitem', [$codticketitem]);

        return parent::setCodticketitem($codticketitem);
    }

    /**
     * {@inheritDoc}
     */
    public function getCodticket()
    {

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
    public function getPrivado()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPrivado', []);

        return parent::getPrivado();
    }

    /**
     * {@inheritDoc}
     */
    public function setPrivado($privado)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPrivado', [$privado]);

        return parent::setPrivado($privado);
    }

    /**
     * {@inheritDoc}
     */
    public function getDtitem()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDtitem', []);

        return parent::getDtitem();
    }

    /**
     * {@inheritDoc}
     */
    public function setDtitem($dtitem)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDtitem', [$dtitem]);

        return parent::setDtitem($dtitem);
    }

    /**
     * {@inheritDoc}
     */
    public function getCodusuario()
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
    public function getNomeoperador()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNomeoperador', []);

        return parent::getNomeoperador();
    }

    /**
     * {@inheritDoc}
     */
    public function setNomeoperador($nomeoperador)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNomeoperador', [$nomeoperador]);

        return parent::setNomeoperador($nomeoperador);
    }

    /**
     * {@inheritDoc}
     */
    public function getCodigooriginalusuario()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCodigooriginalusuario', []);

        return parent::getCodigooriginalusuario();
    }

    /**
     * {@inheritDoc}
     */
    public function setCodigooriginalusuario($codigooriginalusuario)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCodigooriginalusuario', [$codigooriginalusuario]);

        return parent::setCodigooriginalusuario($codigooriginalusuario);
    }

    /**
     * {@inheritDoc}
     */
    public function getNomecliente()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNomecliente', []);

        return parent::getNomecliente();
    }

    /**
     * {@inheritDoc}
     */
    public function setNomecliente($nomecliente)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNomecliente', [$nomecliente]);

        return parent::setNomecliente($nomecliente);
    }

    /**
     * {@inheritDoc}
     */
    public function getDescricao()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDescricao', []);

        return parent::getDescricao();
    }

    /**
     * {@inheritDoc}
     */
    public function setDescricao($descricao)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDescricao', [$descricao]);

        return parent::setDescricao($descricao);
    }

    /**
     * {@inheritDoc}
     */
    public function getCodform()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCodform', []);

        return parent::getCodform();
    }

    /**
     * {@inheritDoc}
     */
    public function setCodform($codform)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCodform', [$codform]);

        return parent::setCodform($codform);
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

}