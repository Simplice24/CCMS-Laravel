<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\LoginConnection;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::group(['middleware'=>"web"],function(){

Route::get('locale/{locale}',function($locale){
      Session::put('locale',$locale);
      return redirect()->back();
});    

Route::get('/', function () {
        return view('Customized/index');
    });
  
Route::group(['middleware'=>["auth"]],function(){
Route::get('registerNewUser',[UserController::class,'addinguserpage']);
Route::get('registerNewCooperative',[UserController::class,'addingcooperativepage']);  
Route::get('registerNewDisease',[UserController::class,'addingdiseasepage']); 
Route::get('registerNewFarmer', [UserController::class, 'addingfarmerpage']);
Route::post('registerNewUser', [UserController::class, 'adduser']);
Route::post('registerNewFarmer',[UserController::class,'addfarmer']);
Route::get('viewsystemuser',[UserController::class,'viewusers']); 
Route::get('viewfarmers',[UserController::class,'viewfarmers']);
Route::get('viewdiseases',[UserController::class,'viewdiseases']);
Route::post('registerNewDisease',[UserController::class, 'addDisease']); 
Route::get('viewcooperatives',[UserController::class, 'viewcooperatives']); 
Route::post('registerNewCooperative',[UserController::class, 'addcooperative']); 
Route::get('ViewAll',function(){
    return view('ViewAll');
   });
Route::get("deleteuser/{id}",[UserController::class,'deleteuser']);   
Route::get("viewuser/{id}",[UserController::class,'viewuser']); 
Route::get('deletecooperative/{id}',[UserController::class,'deletecooperative']); 
Route::get('deletedisease/{id}',[UserController::class,'deletedis']); 
Route::get("update/{id}",[UserController::class,'updateuser']); 
Route::get("viewcooperative/{id}",[UserController::class,'viewcoop']); 
Route::get("updateCooperative/{id}",[UserController::class,'updateCoop']); 
Route::get("updateCooperative/CooperativeUpdate/{id}",[UserController::class,'Cooperativeupdatepage']);
Route::get("Farmerprofile/{id}",[UserController::class,'farmerprofilepage']);
Route::get("Farmerprofile/farmerUpdate/{id}",[UserController::class,'farmerupdatepage']);
Route::put("updateFarmer/{id}",[UserController::class,'updateFarmer']);
Route::put("CooperativeUpdate/{id}",[UserController::class,'updateSystemCooperative']);
Route::get("diseaseDetails/updateDisease/{id}",[UserController::class,'diseaseupdate']);
Route::put("updateDis/{id}",[UserController::class,'DisUpdate']);
Route::get("FarmerView/{id}",[UserController::class,'ViewFarmer']);
Route::get('Home',[UserController::class,'homedashboard']);
Route::get('ManagerHome',[UserController::class,'managerhome']);
Route::get('Managerviewfarmers',[UserController::class,'Managerviewfarmer']);
Route::get("profile/{id}",[UserController::class,'userprofilepage']);
Route::get("profile/profileUpdate/{id}",[UserController::class,'profileupdatepage']);
Route::put('updateUser/{id}',[UserController::class,'updateSystemUser']);
Route::get("forgetpassword",[UserController::class,'forgetpasswordpage']);
Route::get("diseaseDetails/{id}",[UserController::class,'diseasedetailpage']);
Route::get('userProfile',[UserController::class,'profilePage']);
Route::put('userProfileUpdate/{id}',[UserController::class,'userProfileUpdate']);
Route::put('profilePicUpdate/{id}',[UserController::class,'profilePicUpdate']);
Route::put('userPasswordUpdate/{id}',[UserController::class,'userPasswordUpdate']);
Route::get('generatePDF', [UserController::class, 'generatePDF']);
Route::get('Allroles',[RoleController::class, 'showRoles']);
Route::get('Allpermissions',[RoleController::class, 'showPermissions']);
Route::get('Addnewrole',[RoleController::class, 'Addnewrole']);
Route::get('Addnewpermission',[RoleController::class, 'Addnewpermission']);
Route::post('storeRole',[RoleController::class, 'storeRole']);
Route::post('storePermission',[RoleController::class, 'storePermission']);
Route::get('Roledetails/{id}',[RoleController::class,'Roledetails']);
Route::get('Roledetails/RoleUpdate/{id}',[RoleController::class,'RoleUpdatePage']);
Route::put('Roleupdate/{id}',[RoleController::class,'RoleUpdate']);
Route::get('deleterole/{id}',[RoleController::class,'deleterole']);
Route::get('editpermission/{id}',[RoleController::class,'PermissionUpdatePage']);
Route::get('editpermission/permissionUpdate/{id}',[RoleController::class,'PermissionUpdate']);
Route::put('Permissionupdate/{id}',[RoleController::class,'Updatepermission']);
Route::get('deletepermission/{id}',[RoleController::class,'deletepermission']);
});


Route::get('login',function(){
    if(session()->has('user')){
        return redirect('Home');
    }
    return View('Customized/login');
});
Route::post('login',[LoginConnection::class,'login']);

 //});

Route::get('logout',function (){
    if(session()->has('user')){
        session()->pull('user');
    }
    return redirect('/');
});
