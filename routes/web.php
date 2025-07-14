<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;


Route::get('/' ,[ApiController::class,'getAllManga'])->name('home');
Route::get('/read/{mangaId}',[ApiController::class,'getChapter'])->name('read');