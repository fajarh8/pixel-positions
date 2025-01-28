<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    /** @use HasFactory<\Database\Factories\GoodFactory> */
    use HasFactory;

    protected $table = 'goods';

    protected $fillable = [
        'code',
        'name',
        'stock',
    ];

    // public function transactions()
    // {
    //     return $this->hasMany(GoodTransaction::class, 'good_id');
    // }
}
