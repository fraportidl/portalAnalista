<?php

namespace App\Console\Commands;

use App\Rotinas\RotinaConclusao\TicketPendProcessamento;
use Illuminate\Console\Command;
use Doctrine\ORM\EntityManagerInterface;



class ProcessaTickets extends Command
{

    private $em;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ProcessaTickets:processa';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Processa os tickets realizando a cobrança e conclusão';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct();
        $this->em=$em;

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $ticketsPendProc = new TicketPendProcessamento($this->em);
        $result = $ticketsPendProc->processaTickets();
    }
}
