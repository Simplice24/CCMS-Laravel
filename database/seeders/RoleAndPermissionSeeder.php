<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $Admin_role= Role::create(['name' => 'Admin']);
        $Naeb_role = Role::create(['name' => 'Naeb']);
        $Rab_role = Role::create(['name' => 'Rab']);
        $District_agro_role = Role::create(['name' => 'District_agro']);
        $Sector_agro_role = Role::create(['name' => 'Sector_agro']);
        $Sedo_role = Role::create(['name' => 'Sedo']);
        $Manager_role = Role::create(['name' => 'Manager']);

        Permission::create(['name' => 'create-cooperative']);
        Permission::create(['name' => 'create-administration']);
        Permission::create(['name' => 'create-member']);
        Permission::create(['name' => 'create-disease']);
        Permission::create(['name' => 'delete-cooperative']);
        Permission::create(['name' => 'delete-administration']);
        Permission::create(['name' => 'delete-member']);
        Permission::create(['name' => 'delete-disease']);
       Permission::create(['name' => 'update-disease']);
       Permission::create(['name' => 'update-administration']);
       Permission::create(['name' => 'update-cooperative']);
       Permission::create(['name' => 'update-member']);
       Permission::create(['name' => 'view-cooperative']);
       Permission::create(['name' => 'view-administration']);
       Permission::create(['name' => 'view-member']);
       Permission::create(['name' => 'view-disease']);

        $Admin_role->givePermissionTo([
            'create-cooperative',
            'create-administration',
            'create-disease',
            'delete-cooperative',
            'delete-administration',
            'delete-disease',
            'update-cooperative',
            'update-administration',
            'update-disease',
            'view-cooperative',
            'view-administration',
            'view-disease',
            'view-member'
        ]);

        $Naeb_role->givePermissionTo([
            'view-cooperative',
            'view-administration',
            'view-disease',
            'view-member'
        ]);
        $Rab_role->givePermissionTo([
            'view-cooperative',
            'view-administration',
            'view-disease',
            'view-member'
        ]);
        $District_agro_role->givePermissionTo([
            'view-cooperative',
            'view-administration',
            'view-disease',
            'view-member'
        ]);
        $Sector_agro_role->givePermissionTo([
            'view-cooperative',
            'view-administration',
            'view-disease',
            'view-member'
        ]);
        $Sedo_role->givePermissionTo([
            'view-cooperative',
            'view-disease',
            'view-member'
        ]);
        $Manager_role->givePermissionTo([
            'create-member',
            'update-member',
            'delete-member',
            'view-member',
            'view-disease'
        ]);
        
    }
}
