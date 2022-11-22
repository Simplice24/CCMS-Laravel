<?php

use App\Http\Controllers\AdministrationController;
use App\Http\Controllers\CooperativeController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\MemberController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('insertcooperative',[AdministrationController::class,'insertcooperative']);
Route::post('insertmember',[AdministrationController::class,'insertmember']);
Route::post('insertadministration',[AdministrationController::class,'insertAdministration']);
Route::post('insertdisease',[AdministrationController::class,'insertdisease']);

Route::get('viewcooperative/{id?}',[AdministrationController::class,'getCooperativeByID']);
Route::get('viewmember/{id?}',[AdministrationController::class,'getAllMembers']);
Route::get('viewdisease',[AdministrationController::class,'getAllDisease']);
Route::get('viewadministration',[AdministrationController::class,'viewAdministration']);
Route::put('updateAdministration/{id}',[AdministrationController::class,'updateAdministration']);
Route::delete('deleteAdministration/{id}',[AdministrationController::class,'deleteAdministration']);
Route::put('updatecooperative/{id}',[AdministrationController::class,'updatecooperative']);
Route::delete('deletecooperative/{id}',[AdministrationController::class,'deletecooperative']);
Route::put('updatemember/{id}',[AdministrationController::class,'updatemember']);
Route::delete('deletemember/{id}',[AdministrationController::class,'deletemember']);
Route::put('updatedisease/{id}',[AdministrationController::class,'updatedisease']);
Route::delete('deletedisease/{id}',[AdministrationController::class,'deletedisease']);

Route::get('ViewManagers',[AdministrationController::class,'managers']);
Route::get('ViewAdmins',[AdministrationController::class,'admins']);
Route::get('ViewRab',[AdministrationController::class,'rab']);
Route::get('ViewNaeb',[AdministrationController::class,'naeb']);
Route::get('ViewSedos',[AdministrationController::class,'sedo']);
Route::get('ViewDistrict_agros',[AdministrationController::class,'district_agro']);
Route::get('ViewSector_agros',[AdministrationController::class,'sector_agro']);
