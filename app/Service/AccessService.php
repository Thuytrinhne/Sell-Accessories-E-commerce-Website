<?php

namespace App\Service;

use Illuminate\Http\Request;
use Hash;
use App\Models\user;
use Auth;
use App\Models\email_verification;
use App\Http\Requests\AccessRequest;
use App\Http\Requests\PasswordChangeRequest;
use App\Http\Requests\PasswordUpdate;

use Mail;
use App\Mail\ForgotPassword;
use App\Mail\SendEmailCode;
use App\Models\Respositories\AccountRespository;

use Str;


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
    public static function postUser(AccessRequest $request)
    {
        //validate
        // check otp 
        $data = email_verification::where('email', $request->email)->first();
        // hash password
        if ($data->otp != $request->otp)
        {
            // Vui lòng kiểm tra lại mã OTP
            return redirect()->back()->with('Wrong', 'Mã OTP của bạn không chính xác');
        }
        else
        {

            $currentTime= now();
            $time = $data->updated_at->addMinutes(10);
            if ( $time  >=  $currentTime ) 
            {
                $request->merge(['password'=>Hash::make($request->password)]);
                $user = new User;
                $user->full_name=$request->full_name;
                $user->role_id = 1;
                $user->password=$request->password;
                $user->email=$request->email;
                $user->sex=$request->sex;
                $user->birth= $request->birth;
                $user->save();
                return redirect()-> route('login')->with('SignUpSuccess', 'Đăng ký thành công');
            }
            else
            {
                // hết hạn 
                return redirect()-> back()->with('Expired', 'Mã OTP của bạn đã hết hạn');
            }

        }
    }
    public static function postLogin(Request $request)
    {
       
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()-> route('homepage')->with("loginSuccess", "Đăng nhập thành công");
        }
        else
        {
            dd("not found");

        }
    }
    public static function logout()
    {
        Auth::logout();
        return redirect()->route('homepage');
    }
    public static function forgotPassword()
    {
        return view('auth.forgot-pass');
    }
    public static function handleForgotPass(Request $request)
    {
        $user = user::where('email', '=', $request->email)->first();
        if($user)
        {
            $user->remember_token = Str::random(30);
            $user->save();
            Mail::to($user->email)->send(new ForgotPassword($user));
            return redirect()->back()->with('success', 'Vui lòng kiểm tra email và đặt lại mật khẩu bạn nhé');

        }
        else
        {
            $request->flash();
            return redirect()->back()->with('error', 'Email không tồn tại trong hệ thống');
        }
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
    public static function reset($token)
    {
        $user = user::where('remember_token', '=', $token)->first();
        if($user)
            return view('auth.pass-verify', compact('user'));
        else
        return abort(404);
    }
    public static function handlePassVerify($token, PasswordChangeRequest $request)
    {
        $user = user::where ('remember_token', '=', $token)->first();
        if($user)
        {
            $newPassword = $request->password;
            AccountRespository::updatePassword($user,$newPassword);
            return redirect()->route("login")->with("forgotPass", 'Thay đổi mật khẩu thành công. Vui lòng đăng nhập lại nhé');
        }
        else
            return abort(404);
    }
   
    public static function updatePassword()
    {
        return view('front.customer.changePassword');
    }
    public static function handleUpdatePassword(PasswordUpdate $request)
    {
        $user =  Auth::user();
        AccountRespository::updatePassword($user,$request->password);
        return redirect()->back()->with('updatePassSuccess', 'Thay đổi mật khẩu thành công');
    }
    public static function updateInforUser(Request $request)
    {
        $user =  Auth::user();
        AccountRespository::updateInfor($user,$request->full_name, $request->gender, $request->birth);
        return redirect()->back()->with('updateInforSuccess', 'Thay đổi thông tin thành công');

    }

}
