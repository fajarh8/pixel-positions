<?php

namespace App\Events;

use App\Models\Good;
use App\Models\GoodTransaction;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Events\ShouldDispatchAfterCommit;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StockUpdated implements ShouldDispatchAfterCommit
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(
        public int $good_id,
        public string $transaction_type,
        public int $transaction_id,
        public int $quantity
    )
    {
        // switch($transaction_type){
        //     case true:
        //         GoodTransaction::create([
        //             'good_id' => $good_id,
        //             'transaction' => $transaction_type,
        //             'buy_good_id' => $transaction_id,
        //             'quantity' => $quantity,
        //         ]);
        //         Good::where('id', $good_id)->increment('stock', $quantity);
        //         break;
        //     case false:
        //         GoodTransaction::create([
        //             'good_id' => $good_id,
        //             'transaction' => $transaction_type,
        //             'sell_good_id' => $transaction_id,
        //             'quantity' => $quantity,
        //         ]);
        //         Good::where('id', $good_id)->decrement('stock', $quantity);
        //         break;
        // }
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
