<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestbookController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/guestbook', [GuestbookController::class, 'index'])->name('guestbook.index')->middleware('auth');
Route::post('/guestbook', [GuestbookController::class, 'store'])->name('guestbook.store')->middleware('auth');
