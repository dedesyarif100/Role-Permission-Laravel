<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset cahced roles and permission
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'view posts']);
        Permission::create(['name' => 'create posts']);
        Permission::create(['name' => 'edit posts']);
        Permission::create(['name' => 'delete posts']);
        Permission::create(['name' => 'publish posts']);
        Permission::create(['name' => 'unpublish posts']);

        //create roles and assign existing permissions
        $superadminRole = Role::create(['name' => 'superadmin']);
        $superadminRole->givePermissionTo('view posts');
        $superadminRole->givePermissionTo('create posts');
        $superadminRole->givePermissionTo('edit posts');
        $superadminRole->givePermissionTo('delete posts');
        $superadminRole->givePermissionTo('publish posts');
        $superadminRole->givePermissionTo('unpublish posts');

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo('view posts');
        $adminRole->givePermissionTo('create posts');
        $adminRole->givePermissionTo('edit posts');
        $adminRole->givePermissionTo('delete posts');

        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo('view posts');
        // gets all permissions via Gate::before rule

        // create demo users
        $user = User::factory()->create([
            'name' => 'superadmin',
            'email' => 'superadmin@mail.com',
            'password' => bcrypt('1234')
        ]);
        $user->assignRole($superadminRole);

        $user = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('1234')
        ]);
        $user->assignRole($adminRole);

        $user = User::factory()->create([
            'name' => 'user',
            'email' => 'user@mail.com',
            'password' => bcrypt('1234')
        ]);
        $user->assignRole($userRole);
    }
}
