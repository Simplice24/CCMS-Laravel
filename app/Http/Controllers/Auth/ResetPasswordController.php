<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Models\Administration;

class ResetPasswordController extends Controller
{
    
    use ResetsPasswords;

    protected $redirectTo= RouteService::Home;
    protected function redirectTo(){
        if(Auth()->user()->role=="Admin" || Auth()->user()->role=="ADMIN" ){
            return route('Home');
        }
    }
}
