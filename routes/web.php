<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Models\Car;
use App\Http\Controllers\AdministrationController;

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

Route::get('/', function () {
    return view('Index');
});

Route::post('Dashboard', [AdministrationController::class, 'adduser']);
Route::get('viewsystemuser',[AdministrationController::class,'viewusers']);
Route::get('viewfarmers',[AdministrationController::class,'viewfarmers']);
Route::get('viewdiseases',[AdministrationController::class,'viewdiseases']);
Route::post('viewdiseases',[AdministrationController::class, 'addDisease']);
Route::get('viewcooperatives',[AdministrationController::class, 'viewcooperatives']);
Route::post('viewcooperatives',[AdministrationController::class, 'addcooperative']);
Route::get('ViewAll',function(){
    return view('ViewAll');
   });
Route::get("deleteuser/{id}",[AdministrationController::class,'deleteuser']);   
Route::get("viewuser/{id}",[AdministrationController::class,'viewuser']);
Route::get('deletecooperative/{id}',[AdministrationController::class,'deletecooperative']);
Route::get('deletedisease/{id}',[AdministrationController::class,'deletedis']);
Route::get("update/{id}",[AdministrationController::class,'updateuser']);
Route::put("updateUser/{id}",[AdministrationController::class,'updateSystemUser']);
Route::get("viewcooperative/{id}",[AdministrationController::class,'viewcoop']);
Route::get("updateCooperative/{id}",[AdministrationController::class,'updateCoop']);
Route::put("CooperativeUpdate/{id}",[AdministrationController::class,'updateSystemCooperative']);
Route::get("updateDisease/{id}",[AdministrationController::class,'diseaseupdate']);
Route::put("updateDis/{id}",[AdministrationController::class,'DisUpdate']);
Route::get("FarmerView/{id}",[AdministrationController::class,'ViewFarmer']);
Route::get('Home',[AdministrationController::class,'homedashboard']);
Route::get('ManagerHome',[AdministrationController::class,'managerhome']);
Route::get('Managerviewfarmers',[AdministrationController::class,'Managerviewfarmer']);
