<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home' ,[ApiController::class,'getAllManga'])->name('home');
Route::get('/read/{mangaId}',[ApiController::class,'getChapter'])->name('read');