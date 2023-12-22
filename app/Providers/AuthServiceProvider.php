<?php

namespace App\Providers;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->defineGates();
    }

    private function defineGates(): void
    {
        Gate::before(function (User $user) {
            if ($user->role === Role::SUPER_ADMIN->value) {
                return true;
            }
        });

        foreach ($this->getGatesAllowed() as $ability => $roles) {
            Gate::define($ability, function ($user) use ($roles) {
                return in_array($user->role, $roles);
            });
        }
    }

    private function getGatesAllowed(): array
    {
        return [
            'manage-departments' => [Role::ADMIN->value, Role::EMPLOYEE->value],
            'manage-job-titles' => [Role::ADMIN->value],
        ];
    }
}
