<?php

use App\Livewire\Home\Home;
use App\Livewire\Login\Login;
use App\Livewire\PerformanceReview\PerformanceReview;
use App\Livewire\TimeRecord\TimeRecord;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', Login::class)->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [Login::class, 'logout'])->name('logout');
    Route::get('/home', Home::class)->name('home');
    Route::get('/time-record', TimeRecord::class)->name('time-record');
    Route::get('/performance-review', PerformanceReview::class)->name('performance-review');
});
