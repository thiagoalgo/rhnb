<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Tenant;
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
                'Recursos Humanos',
                'Administrativo',
                'Financeiro',
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
