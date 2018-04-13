<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

class Init extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (!config('app.key')) {
            $this->info('Generating app key...');
            Artisan::call('key:generate');
        } else {
            $this->comment('App key exists -- skipping');
        }

        $this->info('Migrating database...');
        Artisan::call('migrate', ['--force' => true]);

        $this->info('Creating admin account...');
        if (!User::where('name', env('ADMIN_NAME'))->exists()) {
            $this->createAdminAccount();

            $this->line(PHP_EOL.' Done. You can login on '.url('/login').' by this credentials:');
            $this->info(' E-Mail Address: '.env('ADMIN_EMAIL'));
            $this->info(' Password:       '.env('ADMIN_PASSWORD'));
        } else {
            $this->comment('Admin account exists -- skipping');
        }
        
        $this->info('Creating storage symbolic link...');
        $this->call('storage:link');

        if ($this->confirm('Do you want to seed your database with test data?')) {
            $this->call('db:seed');
        }

        $this->comment(PHP_EOL.'Done!');
    }

    private function createAdminAccount()
    {
        User::create([
            'name' => env('ADMIN_NAME'),
            'email' => env('ADMIN_EMAIL'),
            'password' => Hash::make(env('ADMIN_PASSWORD')),
        ]);
    }
}
