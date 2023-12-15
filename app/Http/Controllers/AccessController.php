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
use App\Http\Requests\PasswordChangeRequest;

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
       
        return AccessService::sendOTP($request);
    }
    public static function forgotPassword()
    {
        return AccessService::forgotPassword();
    }
    public static function handleForgotPass(Request $request)
    {
        return AccessService::handleForgotPass($request);
        
    }
    public static function reset($token)
    {
        return AccessService::reset($token);

    }
    public static function handlePassVerify($token, PasswordChangeRequest $request)
    {
        return AccessService::handlePassVerify($token, $request);

    }
    public static function updatePassword ()
    {
        return AccessService::updatePassword();
    }
    public static function handleUpdatePassword(PasswordChangeRequest $request)
    {
        return AccessService::handleUpdatePassword($request);

    }
}
