<?php

namespace App\Tenancy\Jobs;

use Stancl\Tenancy\Jobs\DeleteDatabase;

class DeleteDatabaseJob extends DeleteDatabase
{
    public function handle()
    {

        if (!app()->isProduction() && $this->databaseExists()) {
            parent::handle();
        }
    }

    private function databaseExists(): bool
    {
        $database = $this->tenant->database()->getName();
        return $this->tenant->database()->manager()->databaseExists($database);
    }
}
