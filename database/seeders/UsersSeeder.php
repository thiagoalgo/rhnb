<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Thiago Alves Goulart',
            'email' => 'thiagoalgo@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        Tenant::all()->runForEach(function (Tenant $tenant) {
            User::create([
                'name' => 'Thiago ' . strtoupper($tenant->id),
                'email' => $tenant->id . '@gmail.com',
                'password' => bcrypt('123456'),
            ]);
        });
    }
}
