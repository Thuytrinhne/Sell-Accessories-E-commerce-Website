<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = User::select("id", "sex", "full_name", "phone", "email")->get();
        return view("admin.account.account", compact("admin")) -> with('i');
    }
    // (request()->input('page, 1') -1) *5)
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.account.create_account");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        AccountController::create($request->all());
        return redirect()->route("admin.account.acount") -> with('thongbao', 'Thêm tài khoản thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AccountController $admin)
    {
        return view('admin.account.edit_account', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AccountController $admin)
    {
        $admin -> update($request->all());
        return redirect()->route('admin.account.account') -> with('thongbao','Cập nhật thông tin tài khoản thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AccountController $admin)
    {
        $admin -> delete();
        return redirect()->route('admin.account.account') -> with('thongbao','Xoá thông tin thành công');
    }
}
