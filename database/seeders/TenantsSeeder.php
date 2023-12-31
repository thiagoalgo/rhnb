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
        $tenant_ids = [
            'bar',
            'foo',
        ];

        array_map(function ($tenant_id) {
            $tenant = Tenant::create(['id' => $tenant_id]);
            $tenant->domains()->create(['domain' => $this->getDomain($tenant)]);
        }, $tenant_ids);
    }

    private function getDomain(Tenant $tenant): string
    {
        $host = parse_url(env('APP_URL'), PHP_URL_HOST);
        return $tenant->id . '.' . $host;
    }
}
