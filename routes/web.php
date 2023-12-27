<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\User_AddressController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
// trinh use
use App\Http\Controllers\AccessController;
// end trinh use
use App\Http\Controllers\AccountController;
use App\Http\Controllers\WishlishController;
use Illuminate\Support\Facades\Input;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/filter', [ProductController::class, 'filter'])->name('products.filter');


//Route qtoan them vao
Route::group(['prefix' => '/'], function () {
   
   Route::get('/', [ProductController::class, 'getProduct'])->name('homepage');

   Route::get('/product-category/{category}',[ProductController::class,'getProductsByCategory'])->name('get.products.by.category');
   
   Route::get('/detail-product/{id}', [ProductController::class, 'show'])->name('products.show');


   Route::get('/search-product', [ProductController::class,'searchProduct'])->name('products.search');

   Route::get('/get-products-by-value/{value}', [ProductController::class, 'getProductsByValue'])->name('get.products.by.value');

   Route::get('/get-images-by-value/{value}', [ProductController::class, 'getImagesByValue'])->name('get.images.by.value');
   
   Route::get('/get-product-desc}', [ProductController::class, 'descProductsByPrice'])->name('get.product.by.desc');

   Route::get('/get-product-asc}', [ProductController::class, 'ascProductsByPrice'])->name('get.product.by.asc');
   
   Route::get('/get-product/{product}', [ProductController::class, 'getModalProduct'])->name('get.modal.product');

   Route::get('/get-product-latest}', [ProductController::class, 'latestProductsByPrice'])->name('get.product.by.latest');

   // Route::match(['get', 'post'], '/report-product-by-date', [ProductController::class, 'reportProductByDate']);
   
});


Route::get('/aboutUs', function () {
   return view('front.shop.aboutUs');
})->name('front.aboutUs');



//Route qtoan them vao
// Route::group(['prefix' => '/'], function () {
   
//    Route::get('/', [ProductController::class, 'getProduct'])->name('homepage');
   
//    Route::get('/detail-product/{id}', [ProductController::class, 'show'])->name('products.show');


//    Route::get('/get-products-by-value/{value}', [ProductController::class, 'getProductsByValue'])->name('get.products.by.value');

//    Route::get('/get-images-by-value/{value}', [ProductController::class, 'getImagesByValue'])->name('get.images.by.value');
   
//    Route::get('/get-product-desc}', [ProductController::class, 'descProductsByPrice'])->name('get.product.by.desc');

//    Route::get('/get-product-asc}', [ProductController::class, 'ascProductsByPrice'])->name('get.product.by.asc');
   
//    Route::get('/get-product-latest}', [ProductController::class, 'latestProductsByPrice'])->name('get.product.by.latest');
   
// });
// // route Product  (qtoan)

// start admin 
// login for admin 
Route::get('/admin/login', [AdminController::class,'login'])->name('loginAdmin');
Route::post('/admin/login', [AdminController::class,'postLoginAdmin'])->name('postLoginAdmin');
// route function admin
Route::middleware('isAdmin')->prefix('admin')->group(function ()
{
   Route::get('/', [AdminController::class, 'DashboardView'])->name('admin.dashboard');

   Route::get('/product', function () {
   return view('admin.product');
   })->name('admin.product');

    Route::get('/order', [AdminController::class, 'OrderView'])->name('admin.order');
    Route::get('/order/filter', [AdminController::class, 'OrderView1'])->name('admin.order.filter');
    //Thêmm route xử lí report sản phẩm
    
    //Thêmm route xử lí report sản phẩm
    //QToan Thêm route xử lí report sản phẩm
    Route::get('/report', [ProductController::class,'report'])->name('admin.report');
    Route::match(['get', 'post'],'/report/filter', [ProductController::class,'filterReport'])->name('admin.filterReport');



   //Qtoan  Thêm route admin product và item
   Route::prefix('product')->group( function()
   {
      // hiển thị sản phẩm
      Route::get('/', [ProductController::class,'index'])->name('admin.product');
      // xử lý thêm 
      Route::post('/add', [ProductController::class,'store'])->name('admin.product.add');
      // xử lý xóa
      Route::get('/destroy/{id}', [ProductController::class,'destroy'])->name('admin.product.destroy');
      // Hiện form sửa
      Route::get('/edit/{id}', [ProductController::class,'edit'])->name('admin.product.edit');
      // Xử lí sửa
      Route::post('/update/{id}', [ProductController::class,'update'])->name('admin.product.update');
      // Search sản phẩm
      Route::get('/search', [ProductController::class,'search'])->name('admin.product.search');
      
      

      // hiển thị list chi tiết sản phẩm
      Route::get('/show/{product}', [ProductController::class,'indexItem'])->name('admin.product.item');
      //Hiện form thêm chi tiết sản phẩm
      Route::get('/item/{product}/create', [ProductController::class,'createItem'])->name('admin.product.item.create');
      // Xử lí thêm 
      Route::post('/item/{product}/store', [ProductController::class,'storeItem'])->name('admin.product.item.store');
       //Hiện form sửa sản phẩm
       Route::get('/item/edit/{item}', [ProductController::class,'editItem'])->name('admin.product.item.edit');
       // Xử lí thêm 
       Route::post('/item/update/{item}', [ProductController::class,'updateItem'])->name('admin.product.item.update');
       // Xử lí xóa
       Route::get('/item/destroy/{item}', [ProductController::class,'destroyItem'])->name('admin.product.item.destroy');

   });

   //  Route::get('/order', function () {
   //  return view('admin.order');
   //  })->name('admin.order');


// anh Trung route
   // Route::get('/order', function () {
   // return view('admin.order');
   // })->name('admin.order');

  

   Route::any('/search', [AccountController::class,'search'] ) -> name('admin.search_account');;
   Route::prefix('account')->group( function(){
      // hiển thị danh sách danh mục 
      Route::get('/', [AccountController::class,'index'])->name('admin.account');
      // // xử lý thêm danh mục
      Route::prefix('add') -> group(function(){
         Route::match(['GET','POST'],'/admin', [AccountController::class,'storeAdmin'])->name('store.admin');
         Route::match(['GET','POST'],'/staff', [AccountController::class,'storeStaff'])->name('store.staff');
         Route::match(['GET','POST'],'/user', [AccountController::class,'storeUser'])->name('store.user');
      });

      Route::prefix('delete') -> group(function(){
         Route::match(['GET','POST'],'/admin/{id}', [AccountController::class,'destroyAdmin'])->name('destroy.admin');
         Route::match(['GET','POST'],'/staff/{id}', [AccountController::class,'destroyStaff'])->name('destroy.staff');
         Route::match(['GET','POST'],'/user/{id}', [AccountController::class,'destroyUser'])->name('destroy.user');
      });

      Route::prefix('edit') -> group(function(){
         Route::match(['GET','POST'],'/admin/{id}', [AccountController::class,'editAdmin'])->name('edit.admin');
         Route::match(['GET','POST'],'/staff/{id}', [AccountController::class,'editStaff'])->name('edit.staff');
         Route::match(['GET','POST'],'/user/{id}', [AccountController::class,'editUser'])->name('edit.user');
      });
   });


   Route::prefix('category')->group( function()
   {
      // hiển thị danh sách danh mục 
      Route::get('/', [CategoryController::class,'index'])->name('admin.category');
      // xử lý thêm danh mục
      Route::post('/add', [CategoryController::class,'store'])->name('admin.category.add');
      // xử lý xóa danh mục
      Route::get('/delete/{id}', [CategoryController::class,'destroy'])->name('admin.category.destroy');
      // Hiện form sửa
      Route::get('edit/{id}', [CategoryController::class,'edit'])->name('admin.category.edit');
      // Xử lý sửa
      Route::post('update/{id}', [CategoryController::class,'update'])->name('admin.category.update');
      // Xử lí search
      Route::get('search', [CategoryController::class,'search'])->name('admin.category.search');
      
   }
   );
});
// end router admin



// router customer
Route::get('/customer/account', function () {
   return view('front.customer.account');
})->name('front.account');
// địa chỉ customer
Route::get('/customer/address', [User_AddressController::class,'index'])->name('front.address');
Route::get('/customer/address/add', [User_AddressController::class,'create'])->name('front.add-address');
Route::post('/customer/address/add', [User_AddressController::class,'store'])->name('front.handle-add-address');
Route::get('/customer/address/delete/{id}', [User_AddressController::class,'destroy'])->name('front.handle-delete-address');
Route::get('/customer/address/edit/{id}', [User_AddressController::class,'edit'])->name('front.edit-address');
Route::post('/customer/address/edit', [User_AddressController::class,'update'])->name('front.handle-edit-address');



// end địa chỉ customer
Route::get('customer/orders/delete/{id}', [OrderController::class,'destroy'])->name('admin.order.destroy');
Route::get('/customer/orders/detail/{id}', [OrderController::class,'DetailOrder'])->name('front.order_detail');
// end router customer
// cập nhật lại mật khẩu 

Route::get ('/customer/account/changePassWord',  [AccessController::class,'updatePassword'])->name('updatePassword');
Route::post ('/customer/account/changePassWord',  [AccessController::class,'handleUpdatePassword'])->name('handleUpdatePassword');
// chỉnh sửa thông tin cá nhân 
Route::post ('/customer/account/updateProfile',  [AccessController::class,'updateInforUser'])->name('updateInforUser');


// start router auth
// login
Route::get('/login', function () {
   return view('auth.signin');
})->name('login');
Route::post('/login', [AccessController::class,'postLogin'])->name('postLogin');
// logout
Route::get('/logout', [AccessController::class,'logout'])->name('logout');
// Signup
Route::get('/signup', [AccessController::class,'indexSignUp'])->name('signup');
Route::post('/signup', [AccessController::class,'postUser'])->name('postUser');
Route::get('/signup/sendOTP/{email}', [AccessController::class,'sendOTP'])->name('sendOTP');
//forget pass
Route::get('/forgot-pass', [AccessController::class,'forgotPassword'])->name('forgot-pass');
Route::post('/forgot-pass', [AccessController::class,'handleForgotPass'])->name('handleForgot-pass');

Route::get('/pass-verify/{token}', [AccessController::class,'reset'])->name('pass-verify');
Route::post('/pass-verify/{token}', [AccessController::class,'handlePassVerify'])->name('handle-pass-verify');

// end router auth

// router product
Route::get('/checkout',[OrderController::class, 'indexCheckout'] )->name('checkout');
Route::get('/checkout/{id}', [OrderController::class, 'ReCheckout'])->name('re-checkout');
Route::post('/checkout/add',[OrderController::class, 'store'])->name('checkout-success');
Route::get('/checkout/choose-location', [User_AddressController::class, 'index'])->name('choose-location');
Route::get('/checkout/add-location', [User_AddressController::class, 'addAddress'])->name('add-location');
Route::get('/checkout/choose-location', function () {
    return view('front.product-order-screens.choose-location');
 })->name('choose-location');
 Route::get('/checkout/add-location', function () {
    return view('front.product-order-screens.add-location');
 })->name('add-location');
//  Route::get('/wishlist', function () {
//     return view('front.product-order-screens.wishlist');
//Cổng thanh toán điện tử
// Route::post('/checkout/vnpay_payment', [PaymentController::class, 'vnpay_payment'])->name('vnpay-payment');



Route::prefix('/wishlist') -> group(function () {
   Route::get('/', [WishlishController::class,'index'])->name('wishlist');
   Route::post ('/addProduct', [WishlishController::class,'storefromproduct_id'])->name('wishlist.add');
   Route::post ('/addProductItem', [WishlishController::class,'storefromproduct_item_id'])->name('wishlist.addProductItem');
   Route::get ('/deleteWishlistItem/{idWishlistItem}', [WishlishController::class,'destroy'])->name('wishlist.delete');

   // Route::match(['GET','POST'],'/add/{id}', [WishlishController::class,'storeformproduct_item_id'])->name('storeproduct_item_id.wishlists');
   // Route::match(['GET','POST'],'/add/{id}', [WishlishController::class,'storeformproduct_id'])->name('storeproduct_id.wishlists');
   // Route::match(['GET','POST'],'/delete/{id}', [WishlishController::class,'destroy'])->name('destroy.wishlists');
});



 Route::get('/detail-product', function () {
    return view('front.product-order-screens.detail-product');
 })->name('');
 Route::get('/not-found', function () {
    return view('front.product-order-screens.not-found');
 })->name('');
 Route::get('/checkout-success/{id}', [OrderController::class, 'checkoutSuccess'])->name('front.checkout-success');
// end router product

 


Route::prefix('/customer/orders')->group(function () {
   // Hiển thị danh sách các danh mục
   Route::get('/', [OrderController::class, 'index'])->name('.front.customer.history-orders');
   Route::get('/{id}', [OrderController::class, 'indexFilter'])->name('filter.history-order');
});


Route::get ('/cart',[CartController::class, 'getCartitemJSon'] )->name('cart');
//Thêm vào giỏ hàng
Route::match (['get','post'],'/cart/add/{item}',[CartController::class, 'store'] )->name('cart')->name('cart.add');

Route::get('/destroy/{id}',[CartController::class, 'destroyItem'])->name('cart.destroy');

Route::get('/test',[CartController::class, 'getCartitemJSon']);
