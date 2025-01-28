<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyGood extends Model
{
    /** @use HasFactory<\Database\Factories\BuyGoodFactory> */
    use HasFactory;

    protected $table = 'buy_goods';
    protected $fillable = ['good_id', 'quantity'];

    // public function good(){
    //     return $this->belongsTo(Good::class);
    // }
}
