<?php

use App\Enums\Role;

if (!function_exists('rolesAsArray')) {
    function roleToSelect(bool $includeSuperAdmin = false): array
    {
        $rolesValues = [];
        $roles = [];

        if (!$includeSuperAdmin) {
            $rolesValues = array_filter(array_column(Role::cases(), 'value'), function ($role) {
                return Role::SUPER_ADMIN->value !== $role;
            });
        } else {
            $rolesValues = array_column(Role::cases(), 'value');
        }

        foreach ($rolesValues as $value) {
            $roles[] = [
                'label' => __($value),
                'value' => $value
            ];
        }

        return $roles;
    }
}
