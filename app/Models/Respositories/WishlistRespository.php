<?php

namespace App\Models\Respositories;

use App\Models\wishlist;
use App\Models\wishlist_item;
use Illuminate\Http\Request;
use Auth;


class WishlistRespository 
{
    public static function getIdWishListByIdUser()
    {
      $wishlistId = Wishlist::where('user_id',Auth::user()->id)->pluck('id');
      if ($wishlistId->count()==0)
            return 0;

       return $wishlistId[0];
    }
    public static function createWishList()
    {
            $wishlist = new wishlist;
            $wishlist->user_id =Auth::user()->id;  
            $wishlist->save();
    }
    public static function addProductIntoWishList($idWishList, $idProduct)
    {
          $wishlist_item = new wishlist_item();
          $wishlist_item->wishlist_id =  $idWishList;
          $wishlist_item->product_id  =$idProduct;
          $wishlist_item->save();
    }
    public static function addProductItemIntoWishList($idWishList, $idProductItem)
    {
          $wishlist_item = new wishlist_item();
          $wishlist_item->wishlist_id =  $idWishList;
          $wishlist_item->product_item_id =$idProductItem;
          $wishlist_item->save();
    }
    


}