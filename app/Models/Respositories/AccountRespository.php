<?php

namespace App\Models\Respositories;

use App\Models\user;
use Illuminate\Http\Request;
use App\Http\Requests\AccountRequest;


class AccountRepository 
{
    /**
     * Display a listing of the resource.
     */



    /**
     * Store a newly created resource in storage.
     */
    

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
        // return $this->db->delete("admin", ["id"=> $id]);
    }
}
