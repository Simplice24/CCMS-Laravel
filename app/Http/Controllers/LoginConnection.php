<?php

namespace App\Http\Controllers;
use App\Models\Administration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginConnection extends Controller
{

  public function loginpage(){
    return view('login');
  }

  public function login(Request $request)
  {
    $credentials = $request->validate([
          'email' => 'required|email',
          'password' => 'required'
      ]);

      if (Auth::attempt($credentials)) {
        $request->session()->put('user',$credentials);
        return redirect()->intended('Home');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
  }

  public function logout(Request $request)
{
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/');
}

}