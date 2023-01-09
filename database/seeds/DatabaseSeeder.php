<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([RoleSeeder::class]);
    }
   /* DB::table('users')->insert([
        'name' => 'admin',
        'email' => 'admin@localhost.net',
         'password' => bcrypt('password'),
    ])->assignRole('admin');*/
}

