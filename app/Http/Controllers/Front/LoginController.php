<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    //
    public  function login_form()
    {
        $data = DB::select('SELECT * FROM settings');
        $menu="uye";
        return view('front.login',compact('data','menu'));
    }

    public function login(Request $request)
    {
        if($request->isMethod('post')){
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'user','active'=>'True']))
            {
                // echo "Login ok ";
               return redirect('/user');
            } else {
               // echo "Error login ";
               return redirect('/login')->with('message','Hatalı Email yada Şifre');
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
