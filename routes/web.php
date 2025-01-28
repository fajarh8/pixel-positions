<?php

use App\Http\Controllers\GoodController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(GoodController::class)->group( function (){
    Route::get('/good', 'index');
    Route::get('/good/add', 'create');
    Route::post('/good/add', 'store');
    Route::get('/good/transaction', 'show');
    Route::post('/good/transaction', 'update');
    Route::get('/good/history', 'history');
});
