<?php

namespace App\Http\Controllers;
use App\Models\Administration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginConnection extends Controller
{

  public function login(Request $request)
  {
    $credentials = $request->validate([
          'email' => 'required|email',
          'password' => 'required'
      ]);

      if (Auth::attempt($credentials)) {
        $request->session()->put('user',$credentials['email']);
        
        return redirect()->intended('Home');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
  }


}