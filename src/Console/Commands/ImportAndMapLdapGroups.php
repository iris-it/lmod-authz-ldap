<?php

namespace Irisit\AuthzLdap\Console\Commands;

use App\User;
use Irisit\AuthzLdap\Models\Role;
use Adldap\AdldapInterface;
use Illuminate\Console\Command;

use League\CLImate\CLImate;

class ImportAndMapLdapGroups extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lmod_authz:import_groups_ldap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Ldap groups and map them to the users';


    /**
     * Instance of command line utilities tool
     *
     * @var CLImate
     */
    private $climate;

    /**
     * The Adldap instance.
     *
     * @var AdldapInterface
     */
    protected $adldap;

    /**
     * Create a new command instance.
     *
     * @param CLImate $climate
     * @param AdldapInterface $adldap
     */
    public function __construct(CLImate $climate, AdldapInterface $adldap)
    {
        parent::__construct();

        $this->climate = $climate;
        $this->adldap = $adldap;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->climate->lightGreen('Initialization ...')->br();

        $this->getLdapGroups();
    }


    public function getLdapGroups()
    {
        $users = $this->adldap->search()->rawFilter(config('irisit_authz.ldap_filters'))->get();

        foreach ($users as $user) {

            // Local instance of the user
            $eloquent_user = User::where('username', $user->getAccountName())->first();

            // Ldap Groups
            $groups = $user->getGroups();

            $is_admin = $eloquent_user->hasRole('admin');

            // Cleanup
            $eloquent_user->roles()->detach();

            foreach ($groups as $group) {

                $role = Role::firstOrCreate([
                    'name' => $group->getCommonName()
                ]);

                $eloquent_user->roles()->save($role);

            }

            if($is_admin){
                $role = Role::findOrFail(1);
                $eloquent_user->roles()->save($role);
            }

            $this->displayLdapGroups($eloquent_user->username, $groups);
        }
    }

    /**
     * Displays the given users in a table.
     *
     * @param $username
     * @param $groups
     * @return void
     *
     */
    public function displayLdapGroups($username, $groups)
    {

        $data = [];

        foreach ($groups as $group) {
            $data[] = [$group->getCommonName()];
        }

        $this->climate->lightGreen($username . ' mapped to these groups');
        $this->climate->columns($data);
        $this->climate->br();
    }


}