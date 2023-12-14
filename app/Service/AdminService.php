<?php

namespace App\Service;

use Illuminate\Http\Request;
use Auth;

class AdminService 
{
    public static function  login()
    {
        return view('admin.login');
    }
    public static function postLoginAdmin(Request $request)
    {
       if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role_id'=>2])) {
            return redirect()-> route('admin.dashboard');
        }
        else
        {
            dd("not found");
        }
    }
    
}
