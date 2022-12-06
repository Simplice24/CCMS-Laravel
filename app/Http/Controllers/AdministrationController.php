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
use session;

class AdministrationController extends Controller
{
    public function insertAdministration(Request $request){
        $input=$request->all();
        $administration=Administration::create($input);
        return $administration;
       }
       public function viewAdministration(Request $request){
       return Administration::all();
       }
       public function updateAdministration(Request $request,$id){
        $input=Administration::find($id);
        $input->update($request->all());
        return $input;
        }
        public function deleteAdministration($id){
          return Administration::destroy($id);

            }
       public function insertcooperative(Request $request){
        $input=$request->all();
        $cooperative=Cooperative::create($input);
        return $cooperative;
       }
      
       public function getCooperativeByID($id=null){
        return $id?Cooperative::find($id):Cooperative::all();
           }
           public function updatecooperative(Request $request,$id){
            $input=Cooperative::find($id);
            $input->update($request->all());
            return $input;
            }
            public function deletecooperative($id){
              Cooperative::destroy($id);
               return redirect('viewcooperatives');
                }
           public function insertmember(Request $request){
            $input=$request->all();
        $member=Member::create($input);
        return $member;
        }
        public function getAllMembers($id=null){
            return $id?Member::find($id):Member::all();
               }
        public function updatemember(Request $request,$id){
            $input=Member::find($id);
            $input->update($request->all());
            return $input;
            }
            public function deletemember($id){
              return Member::destroy($id);

                }
        public function insertdisease(Request $request){
            $input=$request->all();
            $disease=Disease::create($input);
            return $disease;
           }
           public function getAllDisease(){
            return Disease::all();
               }
           public function updatedisease(Request $request,$id){
            $input=Disease::find($id);
            $input->update($request->all());
            return $input;
            }
            public function deletedisease($id){
              return Disease::destroy($id);

                }

                
                function managers(){
                  $users=DB::table('administrations')->where('role','Manager')->get();
                  return $users;
                }
                function admins(){
                  $users=DB::table('administrations')->where('role','Admin')->get();
                  return $users;
                }
                function rab(){
                  $users=DB::table('administrations')->where('role','Rab')->get();
                  return $users;
                }
                function naeb(){
                  $users=DB::table('administrations')->where('role','Naeb')->get();
                  return $users;
                }
                function sector_agro(){
                  $users=DB::table('administrations')->where('role','Sector_agro')->get();
                  return $users;
                }
                function district_agro(){
                  $users=DB::table('administrations')->where('role','District_agro')->get();
                  return $users;
                }
                function sedo(){
                  $users=DB::table('administrations')->where('role','Sedo')->get();
                  return $users;
                }


                public function viewusers(){
                  $data=Administration::all();
                  return view('Dashboard',['data'=>$data]);
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
                $user->save();
                  return redirect('viewsystemuser');
                }

                public function addcooperative(Request $req){
                  $cooperative=new Cooperative;
                  $cooperative->name=$req->name;
                  $cooperative->manager_name=$req->manager_name;
                  $cooperative->category=$req->category;
                  $cooperative->email=$req->email;
                  $cooperative->province=$req->province;
                  $cooperative->district=$req->district;
                  $cooperative->sector=$req->sector;
                  $cooperative->cell=$req->cell;
                  $cooperative->save();
                  return redirect('viewcooperatives');
                }


                public function viewfarmers(){
                  $info=Member::all();
                  return view('Farmer',['info'=>$info]);
                }

                public function viewdiseases(){
                  $disease=Disease::all();
                  return view('Disease',['disease'=>$disease]);
                }
                public function addDisease(Request $req){
                     $Disease=new Disease;
                     $Disease->disease_name=$req->disease;
                     $Disease->save();
                     return redirect('viewdiseases');
                }
                
                public function viewcooperatives(){
                  $data=Cooperative::all();
                  return view('Cooperative',['data'=>$data]);
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

                public function updateuser($id){
                  $userinfo=Administration::find($id);
                  return view('UpdateAll',['userinfo'=> $userinfo]);
                }

                public function updateCoop($id){
                  $cooperativeinfo=Cooperative::find($id);
                  return view('UpdateCooperative',['cooperativeinfo'=> $cooperativeinfo]);
                }

                public function updateSystemUser(Request $req,$id){
                  $input=Administration::find($id);
                  $input->name=$req->input('name');
                  $input->gender=$req->input('gender');
                  $input->role=$req->input('role');
                  $input->username=$req->input('username');
                  $input->password=$req->input('password');
                  $input->email=$req->input('email');
                  $input->phone=$req->input('phone');
                  $input->province=$req->input('province');
                  $input->district=$req->input('district');
                  $input->sector=$req->input('sector');
                  $input->cell=$req->input('cell');
                  $input->update();
                  return redirect('viewsystemuser');
                }

                public function updateSystemCooperative(Request $req,$id){
                  $input=Cooperative::find($id);
                  $input->name=$req->input('name');
                  $input->manager_name=$req->input('manager_name');
                  $input->category=$req->input('category');
                  $input->email=$req->input('email');
                  $input->province=$req->input('province');
                  $input->district=$req->input('district');
                  $input->sector=$req->input('sector');
                  $input->cell=$req->input('cell');
                  $input->update();
                  return redirect('viewcooperatives');
                }

                public function diseaseupdate($id){
                  $diseaseinfo=Disease::find($id);
                  return view('UpdateDisease',['diseaseinfo'=> $diseaseinfo]);
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
                  return view('DashboardHome',['rows'=>$rows,'farmer'=>$farmer,'cooperative'=>$cooperative,'disease'=>$disease]);
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
                     // else if(Auth::attempt($credentials))
                     //   {
                     //     return redirect()->intended('management/dashboard');
                     //     }
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
