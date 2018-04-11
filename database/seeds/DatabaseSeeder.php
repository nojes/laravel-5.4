<?php

use Illuminate\Database\Seeder;
use nojes\employees\database\seeds\EmployeesDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(EmployeesDatabaseSeeder::class);
    }
}
