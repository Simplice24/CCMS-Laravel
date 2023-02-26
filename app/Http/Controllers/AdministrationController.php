<?php
namespace App\Http\Controllers;
use App\Models\Administration;
use App\Models\Cooperative;
use App\Models\Disease;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;
use session;

class AdministrationController extends Controller
{
    // public function insertAdministration(Request $request){
    //     $input=$request->all();
    //     $administration=Administration::create($input);
    //     return $administration;
    //    }
      //  public function viewAdministration(Request $request){
      //  return Administration::all();
      //  }
      //  public function updateAdministration(Request $request,$id){
      //   $input=Administration::find($id);
      //   $input->update($request->all());
      //   return $input;
      //   }
        // public function deleteAdministration($id){
        //   return Administration::destroy($id);

        //     }
      //  public function insertcooperative(Request $request){
      //   $input=$request->all();
      //   $cooperative=Cooperative::create($input);
      //   return $cooperative;
      //  }
      
      //  public function getCooperativeByID($id=null){
      //   return $id?Cooperative::find($id):Cooperative::all();
      //      }
          //  public function updatecooperative(Request $request,$id){
          //   $input=Cooperative::find($id);
          //   $input->update($request->all());
          //   return $input;
          //   }
            public function deletecooperative($id){
              Cooperative::destroy($id);
               return redirect('viewcooperatives');
                }
        //    public function insertmember(Request $request){
        //     $input=$request->all();
        // $member=Member::create($input);
        // return $member;
        // }
        // public function getAllMembers($id=null){
        //     return $id?Member::find($id):Member::all();
        //        }
        // public function updatemember(Request $request,$id){
        //     $input=Member::find($id);
        //     $input->update($request->all());
        //     return $input;
        //     }
            // public function deletemember($id){
            //   return Member::destroy($id);

            //     }
        // public function insertdisease(Request $request){
        //     $input=$request->all();
        //     $disease=Disease::create($input);
        //     return $disease;
        //    }
          //  public function getAllDisease(){
          //   return Disease::all();
          //      }
          //  public function updatedisease(Request $request,$id){
          //   $input=Disease::find($id);
          //   $input->update($request->all());
          //   return $input;
          //   }
            // public function deletedisease($id){
            //   return Disease::destroy($id);

            //     }

                
                // function managers(){
                //   $users=DB::table('administrations')->where('role','Manager')->get();
                //   return $users;
                // }
                // function admins(){
                //   $users=DB::table('administrations')->where('role','Admin')->get();
                //   return $users;
                // }
                // function rab(){
                //   $users=DB::table('administrations')->where('role','Rab')->get();
                //   return $users;
                // }
                // function naeb(){
                //   $users=DB::table('administrations')->where('role','Naeb')->get();
                //   return $users;
                // }
                // function sector_agro(){
                //   $users=DB::table('administrations')->where('role','Sector_agro')->get();
                //   return $users;
                // }
                // function district_agro(){
                //   $users=DB::table('administrations')->where('role','District_agro')->get();
                //   return $users;
                // }
                // function sedo(){
                //   $users=DB::table('administrations')->where('role','Sedo')->get();
                //   return $users;
                // }


                public function viewusers(){
                  $data=Administration::all();
                  return view('Customized/All-system-user',['data'=>$data]);
              }

              public function addinguserpage(){
                  $roles=Role::all();
                  return view('Customized/Register-new-user',['roles'=>$roles]);
              }
              public function addingcooperativepage(){
                $manager_names=Administration::all()->where('role', 'manager');
                return view('Customized/Register-cooperative',['manager_names'=>$manager_names]);
              }
              public function addingfarmerpage(){
                return view('Customized/Register-new-farmer');
              }
              public function addingdiseasepage(){
                return view('Customized/Register-new-disease');
              }
              public function farmerupdatepage($id){
                $farmerinfo=Member::find($id);
                return view('Customized/Farmer-update',['farmerinfo'=>$farmerinfo]);
              }
               public function updateFarmer(Request $req,$id){
                $farmerupdate=Member::find($id);
                $farmerupdate->name=$req->input('name');
                $farmerupdate->idn=$req->input('idn');
                $farmerupdate->cooperative_name=$req->input('cooperative_name');
                $farmerupdate->cooperative_id=$req->input('cooperative_id');
                $farmerupdate->category=$req->input('category');
                $farmerupdate->gender=$req->input('gender');
                $farmerupdate->number_of_trees=$req->input('number_of_trees');
                $farmerupdate->fertilizer=$req->input('fertilizer');
                $farmerupdate->phone=$req->input('phone');
                $farmerupdate->province=$req->input('province');
                $farmerupdate->district=$req->input('district');
                $farmerupdate->sector=$req->input('sector');
                $farmerupdate->cell=$req->input('cell');
                $farmerupdate->update();
                return redirect('viewfarmers');
               }

              public function adduser(Request $req){
                $user=new Administration;
                $user->name=$req->name;
                $user->gender=$req->gender;
                $user->role=$req->role;
                $user->username=$req->username;
                $user->password=Hash::make($req->password);
                $user->email=$req->email;
                $user->phone=$req->phone;
                $user->province=$req->province;
                $user->district=$req->district;
                $user->sector=$req->sector;
                $user->cell=$req->cell;
                if($user->save()){
                  $user->assignRole($user->role);
                };
                  return redirect('viewsystemuser');
                }

                public function addcooperative(Request $req){
                  $cooperative=new Cooperative;
                  $cooperative->name=$req->name;
                  $cooperative->manager_name=$req->manager_name;
                  $cooperative->category=$req->category;
                  $cooperative->email=$req->email;
                  $cooperative->status=$req->status;
                  $cooperative->starting_date=$req->starting_date;
                  $cooperative->province=$req->province;
                  $cooperative->district=$req->district;
                  $cooperative->sector=$req->sector;
                  $cooperative->cell=$req->cell;
                  $cooperative->save();
                  return redirect('viewcooperatives');
                }


//                 public function role(){
//         $Admin_role= Role::create(['name' => 'Admin']);
//         $Naeb_role = Role::create(['name' => 'Naeb']);
//         $Rab_role = Role::create(['name' => 'Rab']);
//         $District_agro_role = Role::create(['name' => 'District_agro']);
//         $Sector_agro_role = Role::create(['name' => 'Sector_agro']);
//         $Sedo_role = Role::create(['name' => 'Sedo']);
//         $Manager_role = Role::create(['name' => 'Manager']);

//         Permission::create(['name' => 'create-cooperative']);
//         Permission::create(['name' => 'create-administration']);
//         Permission::create(['name' => 'create-member']);
//         Permission::create(['name' => 'create-disease']);
//         Permission::create(['name' => 'delete-cooperative']);
//         Permission::create(['name' => 'delete-administration']);
//         Permission::create(['name' => 'delete-member']);
//         Permission::create(['name' => 'delete-disease']);
//        Permission::create(['name' => 'update-disease']);
//        Permission::create(['name' => 'update-administration']);
//        Permission::create(['name' => 'update-cooperative']);
//        Permission::create(['name' => 'update-member']);
//        Permission::create(['name' => 'view-cooperative']);
//        Permission::create(['name' => 'view-administration']);
//        Permission::create(['name' => 'view-member']);
//        Permission::create(['name' => 'view-disease']);

//         $Admin_role->givePermissionTo([
//             'create-cooperative',
//             'create-administration',
//             'create-disease',
//             'delete-cooperative',
//             'delete-administration',
//             'delete-disease',
//             'update-cooperative',
//             'update-administration',
//             'update-disease',
//             'view-cooperative',
//             'view-administration',
//             'view-disease',
//             'view-member'
//         ]);

//         $Naeb_role->givePermissionTo([
//             'view-cooperative',
//             'view-administration',
//             'view-disease',
//             'view-member'
//         ]);
//         $Rab_role->givePermissionTo([
//             'view-cooperative',
//             'view-administration',
//             'view-disease',
//             'view-member'
//         ]);
//         $District_agro_role->givePermissionTo([
//             'view-cooperative',
//             'view-administration',
//             'view-disease',
//             'view-member'
//         ]);
//         $Sector_agro_role->givePermissionTo([
//             'view-cooperative',
//             'view-administration',
//             'view-disease',
//             'view-member'
//         ]);
//         $Sedo_role->givePermissionTo([
//             'view-cooperative',
//             'view-disease',
//             'view-member'
//         ]);
//         $Manager_role->givePermissionTo([
//             'create-member',
//             'update-member',
//             'delete-member',
//             'view-member',
//             'view-disease'
//         ]);
  
// }


                public function viewfarmers(){
                  $info=Member::all();
                  return view('Customized/All-farmers',['info'=>$info]);
                }

                public function viewdiseases(){
                  $disease=Disease::all();
                  return view('Customized/All-diseases',['disease'=>$disease]);
                }
                public function addDisease(Request $req){
                     $Disease=new Disease;
                     $Disease->disease_name=$req->disease;
                     $Disease->save();
                     return redirect('viewdiseases');
                }

                
                public function viewcooperatives(){
                  $data=Cooperative::all();
                  return view('Customized/All-cooperatives',['data'=>$data]);
                }

                public function userprofilepage($id){
                  $details=Administration::find($id);
                  return view('Customized/User-details',['details'=>$details]);
                }

                public function profileupdatepage($id){
                  $fulldetails=Administration::find($id);
                  $roles=Role::all();
                  return view('Customized/Update-details',['fulldetails'=>$fulldetails,'roles'=>$roles]);
                }

                public function deleteuser($id){
                  $informations=Administration::find($id);
                  $informations->delete();
                  return redirect('viewsystemuser');
                }

                public function viewuser($id){
                  $information=Administration::find($id);
                  return view('ViewAll',['information'=>$information]);
                }

                public function viewcoop($id){
                  $information=Cooperative::find($id);
                  return view('ViewCooperative',['information'=>$information]);
                }

                public function deleteCoop($id){
                $cooperative=Cooperative::find($id);
                $cooperative->delete();
                return redirect('viewcooperatives');
                }

                public function deletedis($id){
                 $disease=Disease::find($id);
                 $disease->delete();
                 return redirect('viewdiseases');
                }

                public function forgetpasswordpage(){
                  return view('Passwords/email');
                }

                public function updateuser($id){
                  $userinfo=Administration::find($id);
                  return view('UpdateAll',['userinfo'=> $userinfo]);
                }

                public function updateCoop($id){
                  $cooperativeinfo=Cooperative::find($id);
                  return view('Customized/Cooperative-details',['cooperativeinfo'=> $cooperativeinfo]);
                }
                public function Cooperativeupdatepage($id){
                  $cooperativeinfo=Cooperative::find($id);
                  $manager_names=Administration::all()->where('role','manager');
                  return view('Customized/Cooperative-update',['cooperativeinfo'=> $cooperativeinfo,'manager_names'=>$manager_names]);
                }

                public function farmerprofilepage($id){
                  $farmerinfo=Member::find($id);
                  return view('Customized/Farmer-details',['farmerinfo'=>$farmerinfo]);
                }


                public function updateSystemUser(Request $req,$id){
                  $input=Administration::find($id);
                  $input->name=$req->input('name');
                  $input->gender=$req->input('gender');
                  $input->role=$req->input('role');
                  $input->username=$req->input('username');
                  $input->email=$req->input('email');
                  $input->phone=$req->input('phone');
                  $input->province=$req->input('province');
                  $input->district=$req->input('district');
                  $input->sector=$req->input('sector');
                  $input->cell=$req->input('cell');
                  if($input->update()){
                    DB::table('model_has_roles')->where('model_id',$id)->delete();
                    $input->assignRole($req->role);
                  };
                  return redirect('viewsystemuser');
                }

                public function updateSystemCooperative(Request $req,$id){
                  $input=Cooperative::find($id);
                  $input->name=$req->input('name');
                  $input->manager_name=$req->input('manager_name');
                  $input->category=$req->input('category');
                  $input->email=$req->input('email');
                  $input->status=$req->input('status');
                  $input->starting_date=$req->input('starting_date');
                  $input->province=$req->input('province');
                  $input->district=$req->input('district');
                  $input->sector=$req->input('sector');
                  $input->cell=$req->input('cell');
                  $input->update();
                  return redirect('viewcooperatives');
                }

                public function addfarmer(Request $req){
                  $input=new Member;
                  $input->name=$req->input('name');
                  $input->idn=$req->input('idn');
                  $input->cooperative_name=$req->input('cooperative_name');
                  $input->cooperative_id=$req->input('cooperative_id');
                  $input->category=$req->input('category');
                  $input->gender=$req->input('gender');
                  $input->number_of_trees=$req->input('number_of_trees');
                  $input->fertilizer=$req->input('fertilizer');
                  $input->phone=$req->input('phone');
                  $input->province=$req->input('province');
                  $input->district=$req->input('district');
                  $input->sector=$req->input('sector');
                  $input->cell=$req->input('cell');
                  $input->save();
                  return redirect('viewfarmers');
                }

                public function diseaseupdate($id){
                  $diseaseinfo=Disease::find($id);
                  return view('Customized/Disease-update',['diseaseinfo'=> $diseaseinfo]);
                }

                public function DisUpdate(Request $req,$id){
                  $input=Disease::find($id);
                  $input->disease_name=$req->input('disease_name');
                  $input->update();
                  return redirect('viewdiseases');
                }

                public function ViewFarmer($id){
                 $farmerinfo=Member::find($id);
                 return view('ViewFarmer',['farmerinfo'=>$farmerinfo]);
                }

                public function homedashboard(){

                  $rows=Administration::count();
                  $farmer=Member::count();
                  $cooperative=Cooperative::count();
                  $disease=Disease::count();
                  $Manager=Administration::where('role','manager')->get()->groupBy(function($ManagerUser){
                    return Carbon::parse($ManagerUser->created_at)->format('Y-M');
                  });
                  $Sedo=Administration::where('role','sedo')->get()->groupBy(function($SedoUser){
                    return Carbon::parse($SedoUser->created_at)->format('Y-M');
                  });
                  $Sector_agro=Administration::where('role','sector_agro')->get()->groupBy(function($SectorAgroUser){
                    return Carbon::parse($SectorAgroUser->created_at)->format('Y-M');
                  });
                  $District_agro=Administration::where('role','district_agro')->get()->groupBy(function($DistrictAgroUser){
                    return Carbon::parse($DistrictAgroUser->created_at)->format('Y-M');
                  });
                  $Rab=Administration::where('role','rab')->get()->groupBy(function($RabUser){
                    return Carbon::parse($RabUser->created_at)->format('Y-M');
                  });
                  $Naeb=Administration::where('role','naeb')->get()->groupBy(function($NaebUser){
                    return Carbon::parse($NaebUser->created_at)->format('Y-M');
                  });
                  $Admin=Administration::where('role','admin')->get()->groupBy(function($AdminUser){
                    return Carbon::parse($AdminUser->created_at)->format('Y-M');
                  });
                  $SuperAdmin=Administration::where('role','SuperAdmin')->get()->groupBy(function($SuperAdminUser){
                    return Carbon::parse($SuperAdminUser->created_at)->format('Y-M');
                  });
                 
                  $Female=Administration::where('gender','Female')->get()->groupBy(function($FemaleUser){
                    return Carbon::parse($FemaleUser->created_at)->format('Y-M');
                  });
                  $Male=Administration::where('gender','Male')->get()->groupBy(function($MaleUser){
                    return Carbon::parse($MaleUser->created_at)->format('Y-M');
                  });
                  $Active=Cooperative::where('status','Operating')->get()->groupBy(function($ActiveCoop){
                    return Carbon::parse($ActiveCoop->created_at)->format('Y-M');
                  });
                  $Inactive=Cooperative::where('status','Not operating')->get()->groupBy(function($InactiveCoop){
                    return Carbon::parse($InactiveCoop->created_at)->format('Y-M');
                  });
                  $Coopdata=Cooperative::select('id','created_at')->get()->groupBy(function($Coopdata){
                    return Carbon::parse($Coopdata->created_at)->format('Y-M');
                  });
                  $Memdata=Member::select('id','created_at')->get()->groupBy(function($Memdata){
                    return Carbon::parse($Memdata->created_at)->format('Y-M');
                  });
                  $Userdata=Administration::select('id','created_at')->get()->groupBy(function($Userdata){
                    return Carbon::parse($Userdata->created_at)->format('Y-M');
                  });
                  $Diseasedata=Disease::select('id','created_at')->get()->groupBy(function($Diseasedata){
                    return Carbon::parse($Diseasedata->created_at)->format('Y-M');
                  });
                  $months=[];
                  $monthCount=[];
                  $MemMonthCount=[];
                  $UserMonthCount=[];
                  $DiseaseMonthCount=[];
                  $ActiveMonthCount=[];
                  $InactiveMonthCount=[];
                  $MaleCount=[];
                  $FemaleCount=[];

                  $ManagerCount=[];
                  $SedoCount=[];
                  $SectorCount=[];
                  $DistrictCount=[];
                  $RabCount=[];
                  $NaebCount=[];
                  $AdminCount=[];
                  $SuperAdminCount=[];


                  foreach($Manager as $managermonth => $values){
                    $ManagerCount[]=count($values);
                  }
                  foreach($Sedo as $sedomonth => $values){
                    $SedoCount[]=count($values);
                  }

                  foreach($Sector_agro as $sectormonth => $values){
                    $SectorCount[]=count($values);
                  }
                  foreach($District_agro as $districtmonth => $values){
                    $DistrictCount[]=count($values);
                  }               
                  foreach($Rab as $rabmonth => $values){
                    $RabCount[]=count($values);
                  }
                  foreach($Naeb as $naebmonth => $values){
                    $NaebCount[]=count($values);
                  }
                  foreach($Admin as $adminmonth => $values){
                    $AdminCount[]=count($values);
                  }
                  foreach($SuperAdmin as $supermonth => $values){
                    $SuperAdminCount[]=count($values);
                  }



                  foreach($Male as $malemonth => $values){
                    $MaleCount[]=count($values);
                  }
                  foreach($Female as $femalemonth => $values){
                    $FemaleCount[]=count($values);
                  }

                  foreach($Active as $activemonth => $values){
                    $ActiveMonthCount[]=count($values);
                  }
                  foreach($Inactive as $inactivemonth => $values){
                    $InactiveMonthCount[]=count($values);
                  }               
                  foreach($Coopdata as $coopmonth => $values){
                    $months[]=$coopmonth;
                    $monthCount[]=count($values);
                  }
                  foreach($Memdata as $memmonth => $values){
                    $Memmonths[]=$memmonth;
                    $MemMonthCount[]=count($values);
                  }
                  foreach($Userdata as $usermonth => $values){
                    $Usermonths[]=$usermonth;
                    $UserMonthCount[]=count($values);
                  }
                  foreach($Diseasedata as $dismonth => $values){
                    $Diseasemonths[]=$dismonth;
                    $DiseaseMonthCount[]=count($values);
                  }
                  
                  return view('Customized/Dashboard',['ManagerCount'=>$ManagerCount,'SedoCount'=>$SedoCount,'SectorCount'=>$SectorCount,'DistrictCount'=>$DistrictCount,'RabCount'=>$RabCount,'NaebCount'=>$NaebCount,'AdminCount'=>$AdminCount,'SuperAdminCount'=>$SuperAdminCount,'MaleCount'=>$MaleCount,'FemaleCount'=>$FemaleCount,'InactiveMonthCount'=>$InactiveMonthCount,'ActiveMonthCount'=>$ActiveMonthCount,'DiseaseMonthCount'=>$DiseaseMonthCount,'Usermonths'=>$Usermonths,'UserMonthCount'=>$UserMonthCount,'Coopdata'=>$Coopdata,'months'=>$months,'monthCount'=>$monthCount,'Memdata'=>$Memdata,'Memmonths'=>$Memmonths,'MemMonthCount'=>$MemMonthCount,'rows'=>$rows,'farmer'=>$farmer,'cooperative'=>$cooperative,'disease'=>$disease]);
                }

                 public function managerhome(){
                  return view('Manager/ManagerHome');
                 }

                 public function Managerviewfarmer(){
                  return view('Manager/ViewMembers');
                 }



                 public function login(Request $request)
                 {
                     $credentials = $request->validate([
                         'email' => ['required', 'email'],
                         'password' => ['required'],
                     ]);
              
                     if (Auth::attempt($credentials)) {
                         $request->session()->regenerate();
                         return redirect()->intended('/');
                     }
                   else{
                     return back()->withErrors([
                         'email' => 'The provided credentials do not match our records.',
                     ])->onlyInput('email');
                 
                 }
             }



             public function logout(Request $request)
                  {
                      Auth::logout();
                      $request->session()->invalidate();
                      $request->session()->regenerateToken();
                      return redirect('/');

                  }

}
