<?php

use App\Livewire\Home;
use App\Livewire\Login;
use App\Livewire\TimeRecord\TimeRecord;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', Login::class)->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', Home::class)->name('home');
    Route::get('/time-record', TimeRecord::class)->name('time-record');
});
