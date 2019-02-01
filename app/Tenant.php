<?php

namespace App;

use App\User;
use Carbon\Carbon;
use Hyn\Tenancy\Environment;
use Hyn\Tenancy\Models\Hostname;
use Hyn\Tenancy\Models\Website;
use Illuminate\Support\Facades\Hash;
use Hyn\Tenancy\Contracts\Repositories\HostnameRepository;
use Hyn\Tenancy\Contracts\Repositories\WebsiteRepository;
use Illuminate\Support\Facades\Config;

/**
 * @property Website website
 * @property Hostname hostname
 * @property User admin
 */

class Tenant
{
    public function __construct()
    {

    }

    public static function deleteTenant($fqdn)
    {

        if ($hostname = Hostname::where('fqdn', $fqdn)->with(['website'])->firstOrFail()) {
            $website = $hostname->website->first();
            app(HostnameRepository::class)->delete($hostname, true);
            app(WebsiteRepository::class)->delete($website, true);
        }

    }

    public static function registerTenant($subdomain, $redirect, $https, $maintenance)
    {
        $website = new Website;
        app(WebsiteRepository::class)->create($website);

        $hostname = new Hostname;
        $hostname->fqdn = $subdomain;
        if ($redirect) $hostname->redirect_to = $redirect;
        if ($https) $hostname->force_https = $https;
        if ($maintenance) $hostname->under_maintenance_since = Carbon::parse($maintenance)->format('Y-m-d H:i:s');
        $hostname->website()->associate($website);
        app(HostnameRepository::class)->attach($hostname, $website);

        return $website;
    }

    public static function registerAdmin($name, $password, $email)
    {
        $admin = User::create(['name' => $name, 'email' => $email, 'password' => bcrypt($password)]);
        $admin->guard_name = 'web';
        $admin->assignRole('admin');

        return $admin;
    }

    public static function tenantExists($fqdn)
    {
        return Hostname::where('fqdn', $fqdn)->exists();
    }
}
