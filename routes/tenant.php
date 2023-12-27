<?php

declare(strict_types=1);

use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Department\DepartmentCreate;
use App\Livewire\Department\Departments;
use App\Livewire\Home\Home;
use App\Livewire\JobTitle\JobTitleCreate;
use App\Livewire\JobTitle\JobTitles;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\PasswordReset;
use App\Livewire\Department\DepartmentEdit;
use App\Livewire\Employee\EmployeeCreate;
use App\Livewire\Employee\EmployeeEdit;
use App\Livewire\Employee\Employees;
use App\Livewire\JobTitle\JobTitleEdit;
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
    Route::get('/forgot-password', ForgotPassword::class)->name('forgot-password');
    Route::get('/password-reset', PasswordReset::class)->name('password.reset');


    Route::middleware(['auth'])->group(function () {
        Route::get('/home', Home::class)->name('home');

        Route::get('/departments', Departments::class)->name('departments')->middleware('can:manage-departments');
        Route::get('/departments/create', DepartmentCreate::class)->name('departments-create')->middleware('can:manage-departments');
        Route::get('/departments/{department}/edit', DepartmentEdit::class)->name('departments-edit')->middleware('can:manage-departments');

        Route::get('/job-titles', JobTitles::class)->name('job-titles')->middleware('can:manage-job-titles');
        Route::get('/job-titles/create', JobTitleCreate::class)->name('job-titles-create')->middleware('can:manage-job-titles');
        Route::get('/job-titles/{jobTitle}/update', JobTitleEdit::class)->name('job-titles-edit')->middleware('can:manage-job-titles');

        Route::get('/employees', Employees::class)->name('employees')->middleware('can:manage-employees');
        Route::get('/employees/create', EmployeeCreate::class)->name('employees-create')->middleware('can:manage-employees');
        Route::get('/employees/{employee}/edit', EmployeeEdit::class)->name('employees-edit')->middleware('can:manage-employees');

        Route::get('/logout', [Login::class, 'logout'])->name('logout');
    });
});
