<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Administration;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     $User= Administration::create([
        'name'=>'NIYONZIMA Simplice',
        'gender'=>'Male',
        'role'=>'SuperAdmin',
        'username'=>'Simplice0',
        'password'=>Hash::make('CCMStesting'),
        'email'=>'nsimplice0@gmail.com',
        'phone'=>'0782576633',
        'province'=>'Southern',
        'district'=>'Muhanga',
        'sector'=>'Shyogwe',
        'cell'=>'Ruli'
     ]);
     $role= Role::create(['name'=>'SuperAdmin']);
     $permissions =Permission::pluck('id','id')->all();
     $role->syncPermissions($permissions);
     $User->assignRole([$role->id]);   
    }
}
