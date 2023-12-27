<?php

namespace Database\Seeders;

use App\Models\JobTitle;
use App\Models\Tenant;
use Illuminate\Database\Seeder;

class JobTitlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tenant::all()->runForEach(function (Tenant $tenant) {
            $jobTitles = [
                'Diretor(a) de Recursos Humanos',
                'Gerente de Recursos Humanos',
                'Analista de Recursos Humanos',
                'Auxiliar de Recursos Humanos'
            ];

            array_map(function ($jobTitle) {
                JobTitle::create([
                    'name' => $jobTitle,
                ]);
            }, $jobTitles);
        });
    }
}
