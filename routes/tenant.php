<?php

declare(strict_types=1);

use App\Livewire\Department\DepartmentCreate;
use App\Livewire\Department\Departments;
use App\Livewire\Department\DepartmentUpdate;
use App\Livewire\Home\Home;
use App\Livewire\JobTitle\JobTitleCreate;
use App\Livewire\JobTitle\JobTitles;
use App\Livewire\JobTitle\JobTitleUpdate;
use App\Livewire\Auth\Login;
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
    Route::get('/password-reset', function () {
        dump(request());
    })->name('password.reset');


    Route::middleware(['auth'])->group(function () {
        Route::get('/home', Home::class)->name('home');

        Route::get('/departments', Departments::class)->name('departments')->middleware('can:manage-departments');
        Route::get('/departments/create', DepartmentCreate::class)->name('departments-create')->middleware('can:manage-departments');
        Route::get('/departments/update/{department}', DepartmentUpdate::class)->name('departments-update')->middleware('can:manage-departments');

        Route::get('/job-titles', JobTitles::class)->name('job-titles')->middleware('can:manage-job-titles');
        Route::get('/job-titles/create', JobTitleCreate::class)->name('job-titles-create')->middleware('can:manage-job-titles');
        Route::get('/job-titles/update/{jobTitle}', JobTitleUpdate::class)->name('job-titles-update')->middleware('can:manage-job-titles');

        Route::get('/logout', [Login::class, 'logout'])->name('logout');
    });
});
