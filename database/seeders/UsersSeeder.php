<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Employee;
use App\Models\JobTitle;
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
        Tenant::all()->runForEach(function (Tenant $tenant) {
            $user = User::query()->create([
                'name' => 'Sr. ' . ucfirst($tenant->id),
                'email' => $tenant->id . '@gmail.com',
                'password' => bcrypt('123456'),
            ]);

            Employee::query()->create([
                'registration' => '0000-0',
                'user_id' => $user->id,
                'department_id' => Department::query()->first()->id,
                'job_title_id' => JobTitle::query()->first()->id,
            ]);
        });
    }
}
