<?php

namespace App\Service;

use Illuminate\Http\Request;
use App\Models\Respositories\User_AddressRespository;
use App\Http\Requests\User_AddressRequest;

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
        public static  function splitStringByDash($chuoi)
        {
           $phanTuT = explode('-', $chuoi);
           return  $phanTuT[1]; // "Tỉnh Bắc Kạn"
        }
        public static function store(User_AddressRequest $request)
        {
            $request->city =  User_AddressService::splitStringByDash($request->city);
            $request->district = User_AddressService::splitStringByDash($request->district);
            
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
          
             return view('front.customer.customer_address.edit-address', compact('user_address', 'id'));

        }
        public static function update(User_AddressRequest $request)
        {
            $request->city =  User_AddressService::splitStringByDash($request->city);
            $request->district = User_AddressService::splitStringByDash($request->district);
            User_AddressRespository::update($request);
            return redirect()->back()->with('updateAddressSuccess', 'Chỉnh sửa địa chỉ mới thành công');

        }
        public static function changeCheckoutAddress($id)
        {
            $listUserAddress = User_AddressRespository::getAllUserAddress();
            return view('front.product-order-screens.choose-location', compact('listUserAddress', 'id'));
 
        }
        public static  function addCheckoutAddress()
        {
            return view('front.product-order-screens.add-location');
        }
        public static function handleChangeCheckoutAddress($id)
        {
            $defaultAddress=User_AddressRespository::getUserAddressById($id);
            return OrderService::handleIndexCheckout($defaultAddress);

        }
        public static function storeAddressCheckout(User_AddressRequest $request)
        {
            $request->city =  User_AddressService::splitStringByDash($request->city);
            $request->district = User_AddressService::splitStringByDash($request->district);
            
            User_AddressRespository::store($request);

            return redirect()->back();
        }
        public static  function backChooseLocation($id)
        {
            return redirect()->route('choose-location-checkout', ['id' => $id]);

        }


}