<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'manage categories',
            'manage packages',
            'manage inclusions',
            'manage plans',
            'manage package banks',
            'checkout package',
            'manage transactions',
            'view orders',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission
            ]);
        }
        
        $customerRole = Role::firstOrCreate([
        'name' => 'customer'
        ]);

        $customerPermissions = [
            'checkout package',
            'view orders',
        ];

        $customerRole->syncPermissions($customerPermissions);

        $superAdminRole = Role::firstOrCreate([
            'name' => 'super_admin'
        ]);

        $user = User::create([
            'name' => "Super Admin",
            'email' => "super@admin.com",
            'password' => bcrypt(88888888),
        ]);
        $user->assignRole($superAdminRole);

        // $superAdmin2 = User::create([
        //     'name' => "Super Admin 2",
        //     'email' => "super2@admin.com",
        //     'password' => bcrypt('88888888'),
        // ]);
        // $superAdmin2->assignRole($superAdminRole);
    
        // $superAdmin3 = User::create([
        //     'name' => "Super Admin 3",
        //     'email' => "super3@admin.com",
        //     'password' => bcrypt('88888888'),
        // ]);
        // $superAdmin3->assignRole($superAdminRole);


    }
}
