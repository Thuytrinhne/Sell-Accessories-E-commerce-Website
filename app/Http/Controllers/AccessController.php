<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\AccessService;
use Hash;
use App\Models\user;
use App\Models\email_verification;
use Auth;
use Mail;
use App\Mail\SendEmailCode;
use App\Http\Requests\AccessRequest;
class AccessController extends Controller
{
    public static function indexSignUp()
    {
        return AccessService::indexSignUp();
    }
    public static function postUser(AccessRequest $request)
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
        // send OTP here
        $otp = rand (100000, 999999);
        email_verification::updateOrCreate(
            ['email' => $request->email],
            [   'email' => $request->email,
                'otp'=> $otp,
            ]
        );
        try {
  
            $data = [
                'otp' => $otp
            ];
             
            Mail::to($request->email)->send(new SendEmailCode($data));
    
        } catch (Exception $e) {
            info("Error: ". $e->getMessage());
        }
        return redirect()->back()->with('sendOTP', $request->email);
    }
    
}
