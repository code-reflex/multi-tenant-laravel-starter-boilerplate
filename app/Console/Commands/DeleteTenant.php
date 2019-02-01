<?php
namespace App\Console\Commands;

use App\Tenant;
use Hyn\Tenancy\Environment;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class DeleteTenant extends Command
{

    protected $signature = 'tenant:delete {name}';

    protected $description = 'Deletes a tenant of the provided name. Only available on the local environment e.g. php artisan tenant:delete boise';

    public function handle()
    {

        // because this is a destructive command, we'll only allow to run this command
        // if you are on the local environment
        if (!app()->isLocal()) {
            $this->error('This command is only available on the local environment.');
            return;
        }

        $this->name = $this->argument('name');
        $baseURL = config('app.url_base');
        $fqdn = $this->name . '.' . $baseURL;

        if (Tenant::tenantExists($fqdn)) {

          Tenant::deleteTenant($fqdn);
          $this->info("Tenant {$this->name} successfully deleted.");

        } else {

          $this->error("Tenant '{$this->name}' does not exists, please retry.");

        }

    }

}
