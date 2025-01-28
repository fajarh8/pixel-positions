<?php

use App\Http\Controllers\GoodController;
use App\Http\Controllers\JobListingController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use App\Models\JobListing;
use Illuminate\Support\Facades\Route;

Route::get('/', [JobListingController::class,'index']);
Route::get('/jobs/create', [JobListingController::class,'create'])->middleware('auth');
Route::post('/jobs/create', [JobListingController::class,'store'])->middleware('auth');
Route::get('/search', SearchController::class);
Route::get('/tags/{tag:name}', TagController::class);

Route::controller(GoodController::class)->group( function (){
    Route::get('/good', 'index');
    Route::get('/good/add', 'create');
    Route::post('/good/add', 'store');
    Route::get('/good/transaction', 'show');
    Route::post('/good/transaction', 'update');
    Route::get('/good/history', 'history');
});

Route::middleware('guest')->group(function () {
    route::get('/register', [RegisterUserController::class, 'create']);
    route::post('/register', [RegisterUserController::class, 'store']);

    route::get('/login', [SessionController::class, 'create']);
    route::post('/login', [SessionController::class, 'store']);
});

route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth');
