<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
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
    Route::get('/', function () {
    return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/product', function () {
    return view('admin.product');
    })->name('admin.product');
   
   //  Thêm route product
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
 Route::get('/wishlist', function () {
    return view('front.product-order-screens.wishlist');
 })->name('wishlist');




 Route::get('/not-found', function () {
    return view('front.product-order-screens.not-found');
 })->name('front.account');
 Route::get('/checkout-success', function () {
   return view('front.product-order-screens.checkout-success');
})->name('front.account');
// end router product

 


