<?php

declare(strict_types=1);

use App\Livewire\Home\Home;
use App\Livewire\Login\Login;
use App\Livewire\PerformanceReview\PerformanceReview;
use App\Livewire\TimeRecord\TimeRecord;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    /* Route::get('/', function () {
        //dd(\App\Models\User::all());
        return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    }); */
    Route::get('/', function () {
        return redirect()->route('login');
    });

    Route::get('/login', Login::class)->name('login');

    Route::middleware(['auth'])->group(function () {
        Route::get('/home', Home::class)->name('home');
        Route::get('/time-record', TimeRecord::class)->name('time-record');
        Route::get('/performance-review', PerformanceReview::class)->name('performance-review');
        Route::get('/logout', [Login::class, 'logout'])->name('logout');
    });
});
