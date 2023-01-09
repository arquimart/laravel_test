<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'user']);

        Permission::create(['name' => 'peliculasCreate'])->SyncRoles($role1);
        Permission::create(['name' => 'peliculasEdit'])->SyncRoles($role1);
        Permission::create(['name' => 'peliculasUpdate'])->SyncRoles($role1);
        Permission::create(['name' => 'peliculasDestroy'])->SyncRoles($role1);
        Permission::create(['name' => 'peliculas'])->SyncRoles($role1,$role2);


    }
}
