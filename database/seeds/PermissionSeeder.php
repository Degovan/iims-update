<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Role
        $admin = Role::create(['name' => 'admin']);

        // Create Permissions
        $perms = [
            ['name' => 'read-product'],
            ['name' => 'read-vendor'],
            ['name' => 'read-user'],
            ['name' => 'read-inventory'],
            ['name' => 'read-customer'],
            ['name' => 'read-role'],
            ['name' => 'read-permission'],
            ['name' => 'read-pr'],
            ['name' => 'read-itr'],
            ['name' => 'read-otr'],
            ['name' => 'read-do']
        ];

        // Create permission and give its all to admin
        foreach($perms as $perm) {
            Permission::create($perm);
            $admin->givePermissionTo($perm['name']);
        }

        // Assign admin role
        $user = User::where('email', 'admin@gmail.com')->first();
        $user->assignRole('admin');
    }
}
