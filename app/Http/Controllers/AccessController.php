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
    public static function indexSignUp(Request $request)
    {
        return AccessService::indexSignUp($request);
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
        return redirect()->back()->with('sendOTP', $request->email)
        ->with('sendOTPSuccess', 'TShopping đã gửi mã xác thực vào Email của bạn vui lòng kiểm tra lại nhé');
    }
    public static function forgotPassword()
    {
        return view('auth.forgot-pass');
    }
    public static function handleForgotPass(Request $request)
    {
        dd($request);
    }
}
