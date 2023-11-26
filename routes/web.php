<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
// trinh use
use App\Http\Controllers\AccessController;
use App\Http\Controllers\AdminController;
// end trinh use

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
// login for admin 
Route::get('/admin/login', function()
{return view('admin.login');})->name('loginAdmin');
Route::post('/admin/login', [AdminController::class,'postLoginAdmin'])->name('postLoginAdmin');
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
 Route::get('/wishlist', function () {
    return view('front.product-order-screens.wishlist');
 })->name('wishlist');
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

 

