<?php

namespace App\Service;

use App\Models\user;
use Illuminate\Http\Request;
use App\Models\Respositories\AccountRespository;
use App\Http\Requests\AccountRequest;
class AccountService 
{
    public function storeAdmin(Request $request)
    {
        if($request->isMethod('POST')){
            $validate = $request->validate([
                'full_name'=> 'required',
                'sex'=> 'required',
                'phone'=> 'required|max:10',
                'email'=> 'required',
                'password'=> 'required',
                'birth'=> 'required'
            ]);
            $params=$request->except('_token');
            $params['role_id'] = 3;
            $admin = user::create($params)->where('role_id', 3)->first();
            if($admin->id){
                return redirect()->route('admin.account')->with('thongbao','Thêm thông tin thành công');
            }
        } return view('admin.account.create_account');
    }
    
    public function editAdmin(Request $request, string $id)
    {
        $admin = user::find($id);
        if($request->isMethod('POST')){ 
            $validate = $request->validate([
                'full_name'=> 'required',
                'sex'=> 'required',
                'phone'=> 'required',
                'email'=> 'required',
                'password'=> 'required',
                'birth'=> 'required'
            ]);
            $params = $request -> except('_token');
            $result=$admin->update($params);
            if($result){
                return redirect()->route('admin.account',['id'=>$id])->with('thongbao','Sửa thông tin thành công');
            }
        }return view('admin.account.edit_account', compact('admin'));
    }
    
    public function destroyAdmin(string $id)
    {
        $admin = user::find($id);
        $admin -> delete();
        return redirect()->route('admin.account') -> with('thongbao','Xoá thông tin thành công');
    }
// =======================  END Thêm xoá sửa admin =========================



// =======================  Thêm xoá sửa staff =========================
public function storeStaff(Request $request)
    {
        if($request->isMethod('POST')){
            $validate = $request->validate([
                'full_name'=> 'required',
                'sex'=> 'required',
                'phone'=> 'required|max:10',
                'email'=> 'required',
                'password'=> 'required',
                'birth'=> 'required'
            ]);
            $params=$request->except('_token');
            $params['role_id'] = 2;

            $staff = user::create($params)->where('role_id', 2)->first();
            if($staff->id){
                return redirect()->route('admin.account')->with('thongbao','Thêm thông tin thành công');
            }
        } return view('admin.account.create_staff_account');
    }
    
    public function editStaff(Request $request, string $id)
    {
        $staff = user::find($id);
        if($request->isMethod('POST')){ 
            $validate = $request->validate([
                'full_name'=> 'required',
                'sex'=> 'required',
                'phone'=> 'required',
                'email'=> 'required',
                'password'=> 'required',
                'birth'=> 'required'
            ]);
            $params = $request -> except('_token');
            $result=$staff->update($params);
            if($result){
                return redirect()->route('admin.account',['id'=>$id])->with('thongbao','Sửa thông tin thành công');
            }
        }return view('admin.account.edit_staff_account', compact('staff'));
    }
    
    public function destroyStaff(string $id)
    {
        $staff = user::find($id);
        $staff -> delete();
        return redirect()->route('admin.account') -> with('thongbao','Xoá thông tin thành công');
    }
// =======================  END Thêm xoá sửa staff =========================




// =======================  Thêm xoá sửa user =========================
public function storeUser(Request $request)
    {
        if($request->isMethod('POST')){
            $validate = $request->validate([
                'full_name'=> 'required',
                'sex'=> 'required',
                'phone'=> 'required|max:10',
                'email'=> 'required',
                'password'=> 'required',
                'birth'=> 'required'
            ]);
            $params=$request->except('_token');
            $params['role_id'] = 1;

            $user = user::create($params)->where('role_id', 1)->first();
            if($user->id){
                return redirect()->route('admin.account.account')->with('thongbao','Thêm thông tin thành công');
            }
        } return view('admin.account.create_user_account');
    }
    
    public function editUser(Request $request, string $id)
    {
        $user = user::find($id);
        if($request->isMethod('POST')){ 
            $validate = $request->validate([
                'full_name'=> 'required',
                'sex'=> 'required',
                'phone'=> 'required',
                'email'=> 'required',
                'password'=> 'required',
                'birth'=> 'required'
            ]);
            $params = $request -> except('_token');
            $result=$user->update($params);
            if($result){
                return redirect()->route('admin.account',['id'=>$id])->with('thongbao','Sửa thông tin thành công');
            }
        }return view('admin.account.edit_user_account', compact('user'));
    }
    
    public function destroyUser(string $id)
    {
        $user = user::find($id);
        $user -> delete();
        return redirect()->route('admin.account') -> with('thongbao','Xoá thông tin thành công');
    }
// =======================  END Thêm xoá sửa user =========================

    public function search(){
        $q = input::get('q');
        $watches = user::where('ten','','LIKE','%' .$q. '%') -> get();
        if(count($watches) > 0){
            return view('/account', ['watches' => $watches]);
        }else {
            return view('/account', with('thongbao', 'Khong tim thay user'));
        }
    }
}
