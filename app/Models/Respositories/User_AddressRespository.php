<?php
namespace App\Models\Respositories;

use App\Models\user_address;
use App\Models\address;
use Illuminate\Http\Request;
use App\Http\Requests\User_AddressRequest;
use Auth;


class User_AddressRespository 
{
      public static function getUserAddressDefault()
      {
       
      return   user_address::select('user_address.id','user_address.full_name', 'user_address.phone', 'address.city', 'address.district', 'address.village', 'address.detail_address')
          ->join('address', 'user_address.address_id', '=', 'address.id')
          ->where('user_address.user_id', Auth()->user()->id)
          ->where('user_address.is_default', 1)
          ->first();
      }
      public static function getUserAddressNotDefault()
      {
      
        return  user_address::select('user_address.id','user_address.full_name', 'user_address.phone', 'address.city', 'address.district', 'address.village', 'address.detail_address')
        ->join('address', 'user_address.address_id', '=', 'address.id')
        ->where('user_address.user_id', Auth()->user()->id)
        ->where('user_address.is_default', 0)
        ->get();

      }
      public static function store(User_AddressRequest $request)
      {
        // kiểm tra địa chỉ đó đã có chưa 
        // nếu chưa thì tạo address

        $address = new address;
       
        $address->city=$request->city;
        $address->district=$request->district;
        $address->village=$request->input('village');
        $address->detail_address=$request->input('detail_address');
        $address->save();

        // tạo address user
        $user_address = new user_address();
        $user_address->full_name = $request->input('full_name');
        $user_address->phone = $request->input('phone');
        $user_address->user_id = Auth()->user()->id;
        $user_address->address_id =  $address->id;
        if (($request->input('default')=== '1'))
        {
            User_AddressRespository::setAddressDefault($user_address);
        }
          $user_address->save();


      }
      public static function setAddressDefault($user_address)
      {
        // gỡ địa chỉ mặc định địa chỉ trước đó nếu có 
         user_address::where('is_default', 1)
        ->where('user_id',Auth()->user()->id)
        ->update(['is_default' => 0]);
        // set địa chỉ mới thành mặc định
        
        $user_address->is_default= 1;
        $user_address->save();
      }

      public static  function destroy($id)
      {
        $user_address = user_address::find($id);
        $user_address->delete();
      }
      public static  function getUserAddressById($id)
      {
        return  user_address::select('user_address.*','address.*' )
        ->join('address', 'user_address.address_id', '=', 'address.id')
        ->where('user_address.id', $id)
        ->get();        
      }
      public static function update(User_AddressRequest $request)
      {

        $userAddress = user_address::find($request->id);
        $userAddress->update([
            'full_name' => $request->full_name,
            'phone' =>$request->phone,
        ]);
        if($request->has('default') &&$request->default=="1")
        {
          User_AddressRespository::setAddressDefault($userAddress);
        }


      }
}
