<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellGood extends Model
{
    /** @use HasFactory<\Database\Factories\SellGoodFactory> */
    use HasFactory;
    protected $table = 'sell_goods';
    protected $fillable = ['good_id', 'quantity'];
}
