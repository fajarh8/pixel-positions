<?php

use App\Http\Controllers\GoodController;
use App\Http\Controllers\JobListingController;
use App\Models\JobListing;
use Illuminate\Support\Facades\Route;

Route::get('/', [JobListingController::class,'index']);

Route::controller(GoodController::class)->group( function (){
    Route::get('/good', 'index');
    Route::get('/good/add', 'create');
    Route::post('/good/add', 'store');
    Route::get('/good/transaction', 'show');
    Route::post('/good/transaction', 'update');
    Route::get('/good/history', 'history');
});
