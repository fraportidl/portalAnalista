<?php
namespace App\Providers;

use App\Models\Persistencia\insertUpdateTicket;
use App\Models\Persistencia\persistParametros;
use Illuminate\Support\ServiceProvider;
use App\Models\Persistencia\persistTicketItem;


class PersistServiceProvider extends ServiceProvider
{
    public function register(){
        $this->app->bind('App\Models\Persistencia\insertUpdateTicket', insertUpdateTicket::class);
        $this->app->bind('App\Models\Persistencia\persistTicketItem', persistTicketItem::class);
        $this->app->bind('App\Models\Persistencia\persistParametros', persistParametros::class);

    }
}
