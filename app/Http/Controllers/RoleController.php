<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use DB;


class RoleController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
         $this->middleware('permission:role-create', ['only' => ['create','store']]);
         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    public function showRoles(){
        $roles=Role::paginate(5);
        return view('Customized/All-roles',['roles'=>$roles]);
    }

    public function showPermissions(){
        $permissions=Permission::paginate(5);
        return view('Customized/All-permissions',['permissions'=>$permissions]);
    }
}
