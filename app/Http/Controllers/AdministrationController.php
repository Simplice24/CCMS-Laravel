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

  public function __construct(){
         $this->middleware('web');
  }
    
            public function deletecooperative($id){
              Cooperative::destroy($id);
               return redirect('viewcooperatives');
                }
        

                public function viewusers(){
                  $userId =auth()->user()->id;
                  $profileImg=Administration::find($userId);
                  $data=Administration::paginate(5);
                  return view('Customized/All-system-user',['data'=>$data,'profileImg'=>$profileImg]);
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
                $cooperatives=Cooperative::all();
                return view('Customized/Register-new-farmer',['cooperatives'=>$cooperatives]);
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
                $userId=auth()->user()->id;
                $profileImg=Administration::find($userId);
                $user=new Administration;
                $destination_path ='public/images/users';
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
                $image=$req->file('image');
                $image_name=$image->getClientOriginalName();
                $path = $req->file('image')->storeAs($destination_path,$image_name);
                $user->image=$image_name;
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

                public function viewfarmers(){
                  $userId=auth()->user()->id;
                  $profileImg=Administration::find($userId);
                  $info=Member::paginate(5);
                  return view('Customized/All-farmers',['info'=>$info,'profileImg'=>$profileImg]);
                }

                public function viewdiseases(){
                  $userId=auth()->user()->id;
                  $profileImg=Administration::find($userId);
                  $disease=Disease::paginate(5);
                  return view('Customized/All-diseases',['disease'=>$disease,'profileImg'=>$profileImg]);
                }
                public function addDisease(Request $req){
                     $Disease=new Disease;
                     $destination_path ='public/images/diseases';
                     $Disease->disease_name=$req->disease;
                     $Disease->category=$req->category;
                     $Disease->description=$req->description;
                     $image=$req->file('image');
                     $image_name=$image->getClientOriginalName();
                     $path = $req->file('image')->storeAs($destination_path,$image_name);
                     $Disease->image=$image_name;
                     $Disease->save();
                      
                     return redirect('viewdiseases');
                }

                
                public function viewcooperatives(){
                  $userId=auth()->user()->id;
                  $profileImg=Administration::find($userId);
                  $data=Cooperative::paginate(5);
                  return view('Customized/All-cooperatives',['data'=>$data,'profileImg'=>$profileImg]);
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
                  $destination_path='public/images/diseases';
                  $input=Disease::find($id);
                  $input->disease_name=$req->input('disease_name');
                  $input->category=$req->input('category');
                  $input->description=$req->input('description');
                  $image=$req->file('image');
                  $image_name=$image->getClientOriginalName();
                  $path=$req->file('image')->storeAs($destination_path,$image_name);
                  $input->image=$image_name;
                  $input->update();
                  return redirect('viewdiseases');
                }
              
                public function userProfileUpdate(Request $req,$id){
                  $input=Administration::find($id);
                  $destination_path ='public/images/users';
                  $input->username=$req->input('username');
                  $input->email=$req->input('email');
                  $input->phone=$req->input('phone');
                  $image=$req->file('image');
                  $image_name=$image->getClientOriginalName();
                  $path = $req->file('image')->storeAs($destination_path,$image_name);
                  $input->image=$image_name;
                  $current_password=$req->input('current_password');
                  $new_password=$req->input('new_password');
                  $confirm_password=$req->input('confirm_new_password');
                  if(Hash::check($current_password, $input->password)){
                    if($new_password===$confirm_password){
                      $input->password=Hash::make($new_password);
                      $input->update();
                    }else{
                      return redirect('userProfile');
                    }
                  }
                  return redirect('Home');
                }

                public function profilePage(){
                  $userId = $id = auth()->user()->id;
                  $userinfo=Administration::find($userId);
                  return view('Customized/User-profile',['userinfo'=>$userinfo,'userId'=>$userId]);
                }

                public function diseasedetailpage($id){
                  $diseaseinfo=Disease::find($id);
                  return view('Customized/Disease-details',['diseaseinfo'=>$diseaseinfo]);
                }

                public function ViewFarmer($id){
                 $farmerinfo=Member::find($id);
                 return view('ViewFarmer',['farmerinfo'=>$farmerinfo]);
                }

                public function homedashboard(){
                  $userId =auth()->user()->id;
                  $profileImg=Administration::find($userId);
                  $rows=Administration::count();
                  $farmer=Member::count();
                  $cooperative=Cooperative::count();
                  $disease=Disease::count();

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
                  $ActiveData=Cooperative::where('status','Operating')->get()->count();
                  $InactiveData=Cooperative::where('status','Not operating')->get()->count();
                  $LeafDiseases=Disease::where('category','Leaf diseases')->get()->count();
                  $RootDiseases=Disease::where('category','Root diseases')->get()->count();
                  $BeanDiseases=Disease::where('category','Bean diseases')->get()->count();
                  $UnclassifiedDiseases=Disease::where('category','Unclassified diseases')->get()->count();
                  $Male=Administration::where('gender','Male')->get()->count();
                  $Female=Administration::where('gender','Female')->get()->count();
                  $Managers=Administration::where('role','manager')->get()->count();
                  $MaleFarmers=Member::where('gender','Male')->get()->count();
                  $FemaleFarmers=Member::where('gender','Female')->get()->count();

                  $months=[];
                  $monthCount=[];
                  $MemMonthCount=[];
                  $UserMonthCount=[];
                  $DiseaseMonthCount=[];
                
                               
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
                  
                  
                  return view('Customized/Dashboard',['profileImg'=>$profileImg,'MaleFarmers'=>$MaleFarmers,'FemaleFarmers'=>$FemaleFarmers,'Male'=>$Male,'Female'=>$Female,'Managers'=>$Managers,'LeafDiseases'=>$LeafDiseases,'RootDiseases'=>$RootDiseases,'BeanDiseases'=>$BeanDiseases,'UnclassifiedDiseases'=>$UnclassifiedDiseases,'ActiveData'=>$ActiveData,'InactiveData'=>$InactiveData,'Diseasemonths'=>$Diseasemonths,
                  'DiseaseMonthCount'=>$DiseaseMonthCount,'Usermonths'=>$Usermonths, 'UserMonthCount'=>$UserMonthCount,'months'=>$months,'monthCount'=>$monthCount,
                  'Memmonths'=>$Memmonths,'MemMonthCount'=>$MemMonthCount,'rows'=>$rows,'farmer'=>$farmer,'cooperative'=>$cooperative,'disease'=>$disease,]);
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
