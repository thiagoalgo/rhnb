<?php

declare(strict_types=1);

use App\Livewire\Department\DepartmentCreate;
use App\Livewire\Department\Departments;
use App\Livewire\Home\Home;
use App\Livewire\Labs\Tenancy;
use App\Livewire\Login\Login;
use App\Livewire\PerformanceReview\PerformanceReview;
use App\Livewire\TimeRecord\TimeRecord;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/', function () {
        return redirect()->route('login');
    });
    Route::get('/login', Login::class)->name('login');

    Route::middleware(['auth'])->group(function () {
        Route::get('/home', Home::class)->name('home');
        Route::get('/time-record', TimeRecord::class)->name('time-record');
        Route::get('/performance-review', PerformanceReview::class)->name('performance-review');
        Route::get('/department', Departments::class)->name('department');
        Route::get('/department/create', DepartmentCreate::class)->name('department-create');
        Route::get('/logout', [Login::class, 'logout'])->name('logout');
    });


    // Labs
    Route::get('/tenancy', Tenancy::class)->name('tenancy');
});
