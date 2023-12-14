<?php

namespace App\Service;

use Illuminate\Http\Request;
use Hash;
use App\Models\user;
use Auth;

class AccessService 
{
    /**
     * Display a listing of the resource.
     */
    public static function indexSignUp()
    {
        $response = response ()
        ->view('auth.signup');
        return $response;
    }
    public static function postUser(Request $request)
    {
    
        //validate
        // hash password
        $request->merge(['password'=>Hash::make($request->password)]);
        $user = new User;
        $user->full_name=$request->full_name;
        $user->role_id = 1;
        $user->password=$request->password;
        $user->email=$request->email;
        $user->save();
        return redirect()-> route('login');
    }
    public static function postLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()-> route('front.homepage');
            dd("thành công");

        }
        else
        {
            dd("not found");

        }
    }
    public static function logout()
    {
        Auth::logout();
        return redirect()->back();
    }

   
}
