<?php

namespace Irisit\AuthzLdap\Console\Commands;

use App\User;
use Illuminate\Console\Command;

use League\CLImate\CLImate;

class ReplaceAllPasswords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lmod_authz:dev_replace_all_passwords';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'DEV ONLY : replaces all user\'s passwords because password sync does not works';


    /**
     * Instance of command line utilities tool
     *
     * @var CLImate
     */
    private $climate;

    /**
     * Create a new command instance.
     *
     * @param CLImate $climate
     */
    public function __construct(CLImate $climate)
    {
        parent::__construct();

        $this->climate = $climate;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $password = $this->ask('Type the password you want to apply');

        $users = User::all();

        foreach ($users as $user) {
            $user->password = bcrypt($password);
            $user->save();
            $this->climate->green('Password changed for ' . $user->username)->br();
        }

        $this->climate->green('Done')->br();
    }


}