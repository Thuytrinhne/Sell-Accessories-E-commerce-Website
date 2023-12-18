<?php

namespace App\Service;

use App\Models\product;
use App\Models\user;
use App\Models\product_item;
use App\Models\wishlist_item;
use Illuminate\Http\Request;
use App\Models\Respositories\Wishlist_ItemRespository;

class WishlistService 
{
    public static function index()
    {
        $product = Wishlist_ItemRespository::product();
        $wishlists = wishlist_item::all();
        return view("front.product-order-screens.wishlist", compact("wishlists", "product"));
    }

    public function storefromproduct_item_id(Request $request, $product_item_id, $user_id)
    {
        // Kiểm tra xem sản phẩm có tồn tại hay không
        $product_item = product_item::find($product_item_id);
        if (!$product_item) {
            return response()->json(['error' => 'Sản phẩm không tồn tại'], 404);
        }

        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        $user = user::user();
        if (!$user) {
            return response()->json(['error' => 'Bạn cần đăng nhập để thêm sản phẩm vào wishlist'], 401);
        }

        // Kiểm tra xem sản phẩm đã được thêm vào wishlist hay chưa
        $wishlist_item = wishlist_item::where('product_item_id', $product_item_id)->where('user_id', $user_id)->first();
        if ($wishlist_item) {
            return response()->json(['message' => 'Sản phẩm đã được thêm vào wishlist'], 200);
        }

        // Thêm sản phẩm vào wishlist
        $wishlist_item = new wishlist_item();
        $wishlist_item->product_item_id = $product_item_id;
        $wishlist_item->user_id = $user_id;
        $wishlist_item->save();

        // Trả về thông báo đã thêm thành công
        return response()->json(['message' => 'Đã thêm sản phẩm vào wishlist'], 201);
    }

    public function storefromproduct_id(Request $request, $product_id, $user_id)
    {
        // Kiểm tra xem sản phẩm có tồn tại hay không
        $product = Product::where('id', $product_id)->first();
        if (!$product) {
            return response()->json(['error' => 'Sản phẩm không tồn tại'], 404);
        }

        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        $user = user::user();
        if (!$user) {
            return response()->json(['error' => 'Bạn cần đăng nhập để thêm sản phẩm vào wishlist'], 401);
        }

        // Kiểm tra xem sản phẩm đã được thêm vào wishlist hay chưa
        $wishlist_item = wishlist_item::where('product_item_id', $product_id)->where('user_id', $user_id)->first();
        if ($wishlist_item) {
            return response()->json(['message' => 'Sản phẩm đã được thêm vào wishlist'], 200);
        }

        // Thêm sản phẩm vào wishlist
        $wishlist_item = new wishlist_item();
        $wishlist_item->product_id = $product_id;
        $wishlist_item->user_id = $user_id;
        $wishlist_item->save();

        // Trả về thông báo đã thêm thành công
        return response()->json(['message' => 'Đã thêm sản phẩm vào wishlist'], 201);
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

    public function destroy(string $wishlist_id, string $id)
    {
        $product = product::find($id);
        $wishlists_id = wishlist_item::find($wishlist_id);
        $wishlists_id -> delete();
        return redirect()->route('front.product-order-screens.wishlist')-> compact('') -> with('thongbao','Xoá thông tin thành công');
    }
}
