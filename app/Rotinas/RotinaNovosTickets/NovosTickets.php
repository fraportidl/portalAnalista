<?php


namespace App\Rotinas\RotinaNovosTickets;


use App\Helpers\MensagemAutomatica;
use App\Http\Soap\Cliente2;
use App\Models\Entity\tbParametros;
use App\Models\Entity\tbTicketItens;
use App\Models\Repository\RepTbTicketItens;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\NoResultException;

class NovosTickets
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    private $Cliente2;

    private $requestDadosTicket = 'formulariohelpdesk';
    /**
     * @var \Doctrine\Persistence\ObjectRepository
     */
    private $RepTicketItens;
    private $codTicket;
    private $codCliente;

    public function __construct(EntityManagerInterface $em, $codTicket, $codCliente)
    {

        $this->em = $em;
        $this->Cliente2= new Cliente2($this->requestDadosTicket);
        $this->RepTicketItens = $this->em->getRepository(tbTicketItens::class);
        $this->codTicket = $codTicket;
        $this->codCliente = $codCliente;
    }

    public function processaNovosTickets()
    {
        /**
         * @var tbParametros $parametros
         */
        $parametros = $this->em->find(tbParametros::class, 1);

        try {
            $nomecliente = $this->RepTicketItens->BuscaNomeCliente($this->codCliente);
        } catch (NoResultException $e) {
            $nomecliente = '';
        }

        $mensagemSaudacaoParametro = $parametros->getMensagemSaudacao();
        $mensagemSaudacao = MensagemAutomatica::criaMensagem($nomecliente,$mensagemSaudacaoParametro,'Suporte Blue TI');

        $this->Cliente2->EnviaMensagemSaudacao($this->codTicket,$mensagemSaudacao);


    }


}
