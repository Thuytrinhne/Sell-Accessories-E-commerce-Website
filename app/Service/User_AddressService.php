<?php

namespace App\Service;

use Illuminate\Http\Request;
use App\Models\Respositories\User_AddressRespository;
class User_AddressService 
{
        public static function index()
        {
              $addressDefault = User_AddressRespository::getUserAddressDefault();
              $addressNotDefault = User_AddressRespository::getUserAddressNotDefault();
              return view('front.customer.customer_address.address', compact('addressDefault', 'addressNotDefault'));

        }
        public static  function create ()
        {
            return view('front.customer.customer_address.add-address');
        }
        public static function store(Request $request)
        {
            User_AddressRespository::store($request);
            return redirect()->route('front.address')->with('addAddressSuccess', 'Thêm địa chỉ mới thành công');
        }
        public static  function destroy($id)
        {
            User_AddressRespository::destroy($id);
            return redirect()->route('front.address')->with('deleteAddressSuccess', 'Xóa địa chỉ thành công');


        }
        public static function edit($id)
        {
            $user_address = User_AddressRespository::getUserAddressById($id);
             return view('front.customer.customer_address.edit-address', compact('user_address'));

        }
        public static function update(Request $request)
        {
            User_AddressRespository::update($request);
        }


}