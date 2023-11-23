<?php

namespace App\Service;

use Illuminate\Http\Request;
use Hash;
use App\Models\user;
use Auth;
use App\Models\email_verification;
use App\Http\Requests\AccessRequest;


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
                $user->sex=$request->gender;
                $user->birth= \Carbon\Carbon::createFromDate($request->YY, $request->MM, $request->DD);
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
