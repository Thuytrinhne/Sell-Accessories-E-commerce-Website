<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\User_AddressController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
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


Route::get('/', [HomepageController::class, 'index']
)->name('front.homepage');
//Qtoan them vao
Route::group(['prefix' => '/'], function () {
   
   Route::get('/', [ProductController::class, 'getProduct'])->name('products.getProduct');
   
   Route::get('/detail-product/{id}', [ProductController::class, 'show'])->name('products.show');

   Route::get('/filter', [ProductController::class, 'filter'])->name('products.filter');
   
});


Route::get('/aboutUs', function () {
    return view('front.shop.aboutUs');
 })->name('front.account');   


// router admin
Route::middleware('isAdmin')->prefix('admin')->group(function ()
{
   Route::get('/', [AdminController::class, 'DashboardView'])->name('admin.dashboard');

    Route::get('/product', function () {
    return view('admin.product');
    })->name('admin.product');

    Route::get('/order', [AdminController::class, 'OrderView'])->name('admin.order');
    Route::get('/order/filter', [AdminController::class, 'OrderView1'])->name('admin.order.filter');

    Route::get('/report', function () {
    return view('admin.report');
    })->name('admin.report');

    Route::get('/account', function () {
    return view('admin.account');
        })->name('admin.account');

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


// rounter customer
Route::get('/customer/account', function () {
   
    return view('front.customer.account');
})->name('front.account');
Route::get('/customer/orders', function () {
   
    return view('front.customer.history-orders');
})->name('front.orders');
Route::get('/customer/address', function () {
   
    return view('front.customer.address');
})->name('front.address');
Route::get('/customer/orders/detail/{id}', [OrderController::class,'DetailOrder'])->name('front.order_detail');
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
Route::get('/checkout',[OrderController::class, 'indexCheckout'] )->name('checkout');
Route::post('/checkout/add',[OrderController::class, 'store'])->name('checkout-success');
Route::get('/checkout/choose-location', [User_AddressController::class, 'index'])->name('choose-location');
 Route::get('/checkout/add-location', [User_AddressController::class, 'addAddress'])->name('add-location');
 Route::get('/wishlist', function () {
    return view('front.product-order-screens.wishlist');
 })->name('wishlist');




 Route::get('/not-found', function () {
    return view('front.product-order-screens.not-found');
 })->name('front.account');
 Route::get('/checkout-success/{id}', [OrderController::class, 'checkoutSuccess'])->name('front.checkout-success');
// end router product

 


Route::prefix('/customer/orders')->group(function () {
   // Hiển thị danh sách các danh mục
   Route::get('/', [OrderController::class, 'index'])->name('.front.customer.history-orders');
   
});


Route::get('/destroy/{id}',[CartController::class, 'destroyItem'])->name('cart.destroy');
