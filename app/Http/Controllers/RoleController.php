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
        $roles=Role::paginate(7);
        return view('Customized/All-roles',['roles'=>$roles]);
    }

    public function showPermissions(){
        $permissions=Permission::paginate(7);
        return view('Customized/All-permissions',['permissions'=>$permissions]);
    }

    public function Addnewrole(){
        $permission = Permission::get();
        return view('Customized/Register-new-role',['permission'=>$permission]);
    }

    public function storeRole(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
    
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
    
        return redirect('Allroles');
    }

    public function Addnewpermission(){
        return view('Customized/Register-new-permission');
    }
    public function storePermission(Request $request){
        $permission=Permission::create(['name' => $request->input('name')]);
        return redirect('Allpermissions');
    }

    public function Roledetails($id){
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();
        return view('Customized/Role-details',['role'=>$role,'rolePermissions'=>$rolePermissions]);
    }
    public function RoleUpdatePage($id){
        $role = Role::find($id);
        $permissions = Permission::get();
        return view('Customized/Role-update',['role'=>$role,'permissions'=>$permissions]);
    }

    public function RoleUpdate(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);
    
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
    
        $role->syncPermissions($request->input('permission'));
    
        return redirect('Allroles');
    }

    public function deleterole($id){
        DB::table("roles")->where('id',$id)->delete();
        return redirect('Allroles');
    }
    public function PermissionUpdatePage($id){
        $permission=Permission::find($id);
        return view('Customized/Permission-detail',['permission'=>$permission]);
    }
    public function PermissionUpdate($id){
        $permission=Permission::find($id);
        return view('Customized/Permission-update',['permission'=>$permission]);
    }

    public function Updatepermission(Request $request, $id){
        $permission = Permission::find($id);
        $permission->name = $request->input('name');
        $permission->update();
        return redirect('Allpermissions');
    }
    public function deletepermission($id){
        Permission::find($id)->delete();
        return redirect('Allpermissions');
    }
}
