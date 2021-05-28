<?php
namespace App\Models\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


/**
 * @Entity(repositoryClass="App\Models\Repository\RepTbDepUsuarios")
 */
class tbDepUsuarios
{
   /**
    * @Id
    * @column(type="integer", nullable=false)
    * @GeneratedValue
    */
   private $Id;
   /**
    * @Column(type="string")
    */
   private $nomedep;
     /**
     * @var ArrayCollection|tbUsuarios[]
     * @OneToMany (targetEntity="tbUsuarios", mappedBy="coddepartamentoint")
     */
   private $codusuario;

   public function __construct()
   {
       $this->codusuario = new ArrayCollection();
   }




   /**
    * Get the value of codusuario
    */
   public function getCodusuario():Collection
   {
      return $this->codusuario;
   }

   /**
    * Set the value of codusuario
    *
    * @return  self
    */
   public function setCodusuario(tbUsuarios $codusuario)
   {
      $this->codusuario->add($codusuario);
      $codusuario->setCoddepartamentoint($this);
      return $this;
   }

   /**
    * Get the value of nomedep
    */
   public function getNomedep()
   {
      return $this->nomedep;
   }

   /**
    * Set the value of nomedep
    *
    * @return  self
    */
   public function setNomedep($nomedep)
   {
      $this->nomedep = $nomedep;

      return $this;
   }

   /**
    * Get the value of Id
    */
   public function getId()
   {
      return $this->Id;
   }
}
