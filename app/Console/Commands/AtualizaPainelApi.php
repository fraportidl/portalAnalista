<?php

namespace App\Console\Commands;

use App\Helpers\Log;
use Illuminate\Console\Command;
use App\Rotinas\Painel\ProcessaDadosApi;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Support\Facades\Date;


class AtualizaPainelApi extends Command
{

    private $em;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'AtualizaPainelApi:atualiza';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Atualiza dados do Painel Automaticamente';

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
        $dtagora = Date('d/m/Y H:i');
       $DadosPainel = new ProcessaDadosApi($this->em);
       $result=   $DadosPainel->processaDadosWS();
       $resultLog = "Data Conculta: {$dtagora} Resposta --> {$result}";
        Log::GeraLog('LogApiMysuite', $resultLog, 'sim');
    }
}
