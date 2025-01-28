<?php

namespace App\Listeners;

use App\Events\StockUpdated;
use App\Models\Good;
use App\Models\GoodTransaction;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class GoodSold implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(StockUpdated $event): void
    {
        switch($event->transaction_type){
            case 'sell':
                Good::where('id', $event->good_id)->decrement('stock', $event->quantity);
                $stock = Good::where('id', $event->good_id)->value('stock');
                GoodTransaction::create([
                    'good_id' => $event->good_id,
                    'transaction' => $event->transaction_type,
                    'sell_good_id' => $event->transaction_id,
                    'quantity' => $event->quantity,
                    'stock' => $stock,
                ]);
                break;
            case 'buy':
                break;
            default:
                break;
        }
    }
}
