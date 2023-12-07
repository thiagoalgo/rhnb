<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Seeder;

class TenantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tenant = Tenant::create(['id' => 'foo']);
        $tenant->domains()->create(['domain' => 'foo.localhost']);

        $tenant = Tenant::create(['id' => 'bar']);
        $tenant->domains()->create(['domain' => 'bar.localhost']);
    }
}
