<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodTransaction extends Model
{
    /** @use HasFactory<\Database\Factories\GoodTransactionFactory> */
    use HasFactory;

    protected $fillable = [
        'good_id',
        'transaction',
        'buy_good_id',
        'sell_good_id',
        'quantity',
        'stock',
    ];

    public function good(){
        return $this->belongsTo(Good::class, 'good_id', 'id');
    }

    public function sell(){
        return $this->belongsTo(SellGood::class, 'sell_good_id', 'id');
    }

    public function buy(){
        return $this->belongsTo(BuyGood::class, 'buy_good_id', 'id');
    }
}
