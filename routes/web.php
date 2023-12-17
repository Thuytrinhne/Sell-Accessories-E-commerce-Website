<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
   return view('homepage');
})->name('front.homepage');
Route::get('/aboutUs', function () {
   return view('front.shop.aboutUs');
})->name('front.account');


// router admin
Route::middleware('isAdmin')->prefix('admin')->group(function ()
{
   Route::get('/', function () {
   return view('admin.dashboard');
   })->name('admin.dashboard');

   Route::get('/product', function () {
   return view('admin.product');
   })->name('admin.product');

   Route::get('/order', function () {
   return view('admin.order');
   })->name('admin.order');

   Route::get('/report', function () {
   return view('admin.report');
   })->name('admin.report');

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
      // sửa 1 danh mục
      Route::get('/edit', [CategoryController::class,'edit'])->name('admin.category.edit');
   }
   );
});
// end router admin


// router customer
Route::get('/customer/account', function () {
   
   return view('front.customer.account');
})->name('front.account');
Route::get('/customer/orders', function () {
   
    return view('front.customer.history-orders');
})->name('front.orders');
Route::get('/customer/address', function () {
   
    return view('front.customer.address');
})->name('front.address');
Route::get('/customer/orders/detail', function () {
    return view('front.customer.detail-order');
})->name('front.order_detail');
// end router customer


// router auth
Route::get('/login', function () {
   return view('auth.signin');
})->name('login');
Route::get('/signup', function () {
   return view('auth.signup');
})->name('signup');
Route::get('/forgot-pass', function () {
   return view('auth.forgot-pass');
})->name('forgot-pass');
Route::get('/pass-verify', function () {
    return view('auth.pass-verify');
 })->name('pass-verify');
 
// end router auth

// router product
Route::get('/checkout', function () {
    return view('front.product-order-screens.checkout');
 })->name('checkout');
 Route::get('/checkout/choose-location', function () {
    return view('front.product-order-screens.choose-location');
 })->name('choose-location');
 Route::get('/checkout/add-location', function () {
    return view('front.product-order-screens.add-location');
 })->name('add-location');
//  Route::get('/wishlist', function () {
//     return view('front.product-order-screens.wishlist');


Route::prefix('/wishlist') -> group(function () {
   Route::get('/', [WishlishController::class,'index'])->name('wishlist');
   Route::match(['GET','POST'],'/add/{id}', [WishlishController::class,'storeformproduct_item_id'])->name('storeproduct_item_id.wishlists');
   Route::match(['GET','POST'],'/add/{id}', [WishlishController::class,'storeformproduct_id'])->name('storeproduct_id.wishlists');
   Route::match(['GET','POST'],'/delete/{id}', [WishlishController::class,'destroy'])->name('destroy.wishlists');
});


 Route::get('/filter', function () {
    return view('front.product-order-screens.filter');
 })->name('filter');
 Route::get('/detail-product', function () {
    return view('front.product-order-screens.detail-product');
 })->name('front.account');
 Route::get('/not-found', function () {
    return view('front.product-order-screens.not-found');
 })->name('front.account');
 Route::get('/checkout-success', function () {
   return view('front.product-order-screens.checkout-success');
})->name('front.account');
// end router product

 


