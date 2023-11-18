<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\AccessService;
use Hash;
use App\Models\user;
use Auth;
use Mail;
class AccessController extends Controller
{
    public static function indexSignUp()
    {
        return AccessService::indexSignUp();
    }
    public static function postUser(Request $request)
    {
        return AccessService::postUser($request);

    }
    public static function postLogin(Request $request)
    {
        return AccessService::postLogin( $request);

    }
    public static function logout()
    {
        return AccessService::logout();
    }
    public static function sendOTP(Request $request)
    {
        $name ="test name for email";
        Mail::send('welcome', compact('name'), function($email)
        {
            $email->to('mongthitrinhtkp@gmail.com', 'Đồ Phụ Liện');
        });
        return redirect()->back();
    }
    
}
