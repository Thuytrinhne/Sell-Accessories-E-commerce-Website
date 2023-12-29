<?php

namespace App\Service;

use App\Models\product;
use App\Models\user;
use App\Models\product_item;
use App\Models\wishlist_item;
use Illuminate\Http\Request;
use App\Models\Respositories\Wishlist_ItemRespository;
use Auth;
use App\Models\Respositories\WishlistRespository;

class WishlistService 
{
    public static function index()
    {
        $product = Wishlist_ItemRespository::product();
        $wishlists = wishlist_item::all();
        return view("front.product-order-screens.wishlist", compact("wishlists", "product"));
    }

    public static function storefromproduct_item_id(Request $request)
    {
        // kiểm tra có wishlist?
        $idWishList = WishlistRespository::getIdWishListByIdUser();
        
        if($idWishList ==0)
        {
            // chưa thì tạo wishlist mới
            WishlistRespository::createWishList();
        }

        
        // Thêm sản phẩm item vào wishlist
        WishlistRespository::addProductItemIntoWishList( $idWishList, $request->productId );

        // Trả về thông báo đã thêm thành công
        return redirect()->back()->with(['addWishSuccess' => 'Đã thêm sản phẩm vào wishlist']);
     

     

        
    }

    public static function storefromproduct_id(Request $request)
    {
        // kiểm tra có wishlist?
       $idWishList = WishlistRespository::getIdWishListByIdUser();
       if($idWishList ==0)
       {
            // chưa thì tạo wishlist mới
            WishlistRespository::createWishList();
       }

        
        // Thêm sản phẩm vào wishlist
        WishlistRespository::addProductIntoWishList( $idWishList, $request->productId );
    
        // Trả về thông báo đã thêm thành công
        return redirect()->back()->with(['addWishSuccess' => 'Đã thêm sản phẩm vào wishlist']);
    }

    function checkWishlistType($wishlist_item)
    {
        // Kiểm tra xem wishlist item được thêm vào bằng product_item_id hay product_id
        if ($wishlist_item->product_item_id) {
            // Wishlist item được thêm vào bằng product_item_id
            return "<a href='{{ route('storeproduct_item_id.wishlists', $wishlist_item->id) }}' class='btn btn-primary'>Thêm vào giỏ hàng</a>";
        } else {
            // Wishlist item được thêm vào bằng product_id
            return "<a href='{{ route('storeproduct_id.wishlists', $wishlist_item->product_id) }}' class='btn btn-primary'>Chọn màu</a>";
        }
    }
    public function product(Request $request){
        $product = product::find($request->product_id);
    }

    public static function destroy( $id)
    {
        Wishlist_ItemRespository::destroy($id);
       
        return redirect()->back()-> with('deleteSuccess','Xoá thông tin thành công');
    }
}
