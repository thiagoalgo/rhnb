<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Seeder;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tenant::all()->runForEach(function (Tenant $tenant) {
            $departments = [
                'Administrativo',
                'Financeiro',
                'Recursos Humanos',
                'Comercial'
            ];

            array_map(function ($department) {
                Department::create([
                    'name' => $department
                ]);
            }, $departments);
        });
    }
}
