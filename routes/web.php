<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Models\Car;
use App\Http\Controllers\AdministrationController;
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

//Route::group(['middleware'=>"web"],function(){

Route::get('locale/{locale}',function($locale){
      Session::put('locale',$locale);
      return redirect()->back();
});    

Route::get('/', function () {
        return view('Customized/index');
    });
  
Route::group(['middleware'=>"web"],function(){

Route::get('registerNewUser',[AdministrationController::class,'addinguserpage']); 
Route::get('registerNewCooperative',[AdministrationController::class,'addingcooperativepage']);  
Route::get('registerNewDisease',[AdministrationController::class,'addingdiseasepage']); 
Route::get('registerNewFarmer', [AdministrationController::class, 'addingfarmerpage']);
Route::post('registerNewUser', [AdministrationController::class, 'adduser']);
Route::post('registerNewFarmer',[AdministrationController::class,'addfarmer']);
Route::get('viewsystemuser',[AdministrationController::class,'viewusers']);
Route::get('viewfarmers',[AdministrationController::class,'viewfarmers']);
Route::get('viewdiseases',[AdministrationController::class,'viewdiseases']);
Route::post('registerNewDisease',[AdministrationController::class, 'addDisease']);
Route::get('viewcooperatives',[AdministrationController::class, 'viewcooperatives']);
Route::post('registerNewCooperative',[AdministrationController::class, 'addcooperative']);
Route::get('ViewAll',function(){
    return view('ViewAll');
   });
Route::get("deleteuser/{id}",[AdministrationController::class,'deleteuser']);   
Route::get("viewuser/{id}",[AdministrationController::class,'viewuser']);
Route::get('deletecooperative/{id}',[AdministrationController::class,'deletecooperative']);
Route::get('deletedisease/{id}',[AdministrationController::class,'deletedis']);
Route::get("update/{id}",[AdministrationController::class,'updateuser']);
Route::get("viewcooperative/{id}",[AdministrationController::class,'viewcoop']);
Route::get("updateCooperative/{id}",[AdministrationController::class,'updateCoop']);
Route::get("updateCooperative/CooperativeUpdate/{id}",[AdministrationController::class,'Cooperativeupdatepage']);
Route::get("Farmerprofile/{id}",[AdministrationController::class,'farmerprofilepage']);
Route::get("Farmerprofile/farmerUpdate/{id}",[AdministrationController::class,'farmerupdatepage']);
Route::put("updateFarmer/{id}",[AdministrationController::class,'updateFarmer']);
Route::put("CooperativeUpdate/{id}",[AdministrationController::class,'updateSystemCooperative']);
Route::get("diseaseDetails/updateDisease/{id}",[AdministrationController::class,'diseaseupdate']);
Route::put("updateDis/{id}",[AdministrationController::class,'DisUpdate']);
Route::get("FarmerView/{id}",[AdministrationController::class,'ViewFarmer']);
Route::get('Home',[AdministrationController::class,'homedashboard']);
Route::get('ManagerHome',[AdministrationController::class,'managerhome']);
Route::get('Managerviewfarmers',[AdministrationController::class,'Managerviewfarmer']);
Route::get("profile/{id}",[AdministrationController::class,'userprofilepage']);
Route::get("profile/profileUpdate/{id}",[AdministrationController::class,'profileupdatepage']);
Route::put('updateUser/{id}',[AdministrationController::class,'updateSystemUser']);
Route::get("forgetpassword",[AdministrationController::class,'forgetpasswordpage']);
Route::get("diseaseDetails/{id}",[AdministrationController::class,'diseasedetailpage']);
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
