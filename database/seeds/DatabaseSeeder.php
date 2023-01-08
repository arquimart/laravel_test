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
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@localhost.net',
            'password' => bcrypt('password'),
        ]);

        DB::table('rol_usuario')->insert([
            'admin' => true,
            'id_usuario'=>1
        ]);
    }
}
