<?php

namespace Irisit\AuthzLdap\Console\Commands;

use Illuminate\Console\Command;

class LdapImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'authz:ldap_import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Wraps the adldap:import with filters ( see config file )';


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->call('adldap:import', [
            '--filter' => config('irisit_authz.ldap_filters'),
            '--no-interaction'
        ]);

    }
}
