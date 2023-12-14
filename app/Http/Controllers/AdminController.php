<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Service\AdminService ;

class AdminController extends Controller
{
    public static function  login()
    {
        return AdminService::login();
    }
    public static function postLoginAdmin(Request $request)
    {
       return  AdminService::postLoginAdmin($request);
    
    }
    
}
