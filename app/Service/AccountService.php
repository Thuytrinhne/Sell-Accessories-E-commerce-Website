<?php

namespace App\Service;

use App\Models\user;
use Illuminate\Http\Request;
use App\Models\Respositories\AccountRespository;
use App\Http\Requests\AccountRequest;
class AccountService 
{
    public static function storeAdmin(Request $request)
    {
        
    }
    /**
     * Display a listing of the resource.
     */
    public static function index(Request $request)
    {

    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }
        //xử lý thêm 1 danh mục


    /**
     * Store a newly created resource in storage.
     */
    public static  function store(AccountRequest $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(user $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, user $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public static function destroy($id)
    {
        // try
        // {
        //     AccountRespository::destroy($id);
        // }catch (\Exception  $exception) {
        //     return back()->withError('Category có ID = ' . $id . ' đã thuộc về 1 danh mục khác')->withInput();
        // };
        
        // return redirect()->back()->with('DestroySuccess', 'Xóa thành công');
    }
}
