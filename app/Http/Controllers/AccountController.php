<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Service\AccountService;
use Illuminate\Support\Facades\Input;


class AccountController extends Controller
{
    public function index()
    {
        // $id = AccountController::getId();
        // $i = $id;
        // $j = 0;
        // $k = 0;
        $admin = user::where('user.role_id','=',1)->get();
        $staff = user::where('user.role_id','=',2)->get();
        $user = user::where('user.role_id','=',3)->get();
        return view("admin.account.account", compact("admin", "staff", "user"));
    }
// =======================  Thêm xoá sửa admin =========================
    public function storeAdmin(Request $request)
    {
        return AccountService::storeAdmin($request);
    }
    
    public function editAdmin(Request $request, string $id)
    {
        return AccountService::editAdmin($request,$id);
    }
    
    public function destroyAdmin(string $id)
    {
        return AccountService::destroyAdmin($id);

    }
// =======================  END Thêm xoá sửa admin =========================



// =======================  Thêm xoá sửa staff =========================
public function storeStaff(Request $request)
    {
        return AccountService::storeStaff($request);
    }
    
    public function editStaff(Request $request, string $id)
    {
        return AccountService::editStaff($request,$id);
    }
    
    public function destroyStaff(string $id)
    {
        return AccountService::destroyStaff($id);
    }
// =======================  END Thêm xoá sửa staff =========================




// =======================  Thêm xoá sửa user =========================
public function storeUser(Request $request)
    {
        return AccountService::storeUser($request);
    }
    
    public function editUser(Request $request, string $id)
    {
        return AccountService::editUser($request,$id);
    }
    
    public function destroyUser(string $id)
    {
        return AccountService::destroyUser($id);
    }
// =======================  END Thêm xoá sửa user =========================

    public function search(Request $request){
        return AccountService::search($request);
    }
}
