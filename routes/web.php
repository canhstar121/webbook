<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\User\AuthUserController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\LinkController;
use App\Http\Controllers\User\MyAccountController;
use App\Http\Controllers\User\SharedController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
// Route::get('test', function () {
//     $customer = OrderCustomer::select(['a.cusId', 'a.id as orderid', 'order_customers.*'])
//         ->join('orders as a', 'a.cusId', 'order_customers.id')
//         ->where('a.id', 1)
//         ->first();
//     dd($customer);
// });
// Route::get('/', [HomeController::class, 'index'])->name('home');
Route::controller(LinkController::class)->group(function () {
    Route::get('yeu-thich', 'index')->name('link.index');
    Route::get('so-sanh', 'create')->name('link.create');
    Route::get('yeu-thich/{id}', 'show')->name('link.show');
    Route::get('so-sanh/{id}', 'edit')->name('link.edit');
    Route::post('so-sanh/tim-kiem', 'store')->name('link.store');
});
Route::controller(SharedController::class)->group(function () {
    Route::get('lien-he', 'index')->name('shared.index');
    Route::get('gioi-thieu', 'create')->name('shared.create');
    Route::post('them-ma-giam-gia', 'store')->name('shared.store');
});
Route::controller(MyAccountController::class)->group(function () {
    Route::get('thong-tin-tai-khoan', 'index')->name('myaccount.index');
    Route::post('thong-tin-tai-khoan', 'store')->name('myaccount.store');
    Route::get('thong-tin-tai-khoan/don-hang/{id}', 'show')->name('myaccount.show');
});
Route::controller(AuthUserController::class)->group(function () {
    Route::get('dang-nhap', 'index')->name('authuser.index');
    Route::get('dang-ky', 'create')->name('authuser.create');
});
Route::middleware('cors')->controller(CartController::class)->group(function () {
    Route::get('gio-hang', 'index')->name('cart.index');
    Route::get('thanh-toan', 'create')->name('cart.create');
    Route::post('thanh-toan', 'store')->name('cart.store');
    Route::get('xoa-gio-hang/{id}', 'show')->name('cart.show');
    Route::get('sua-gio-hang/{id}', 'edit');

    Route::get('paypal', 'getPaymentStatus')->name('status');
});
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home.index');
    Route::get('san-pham', 'create')->name('home.create');
    Route::get('tim-kiem', 'create')->name('search.index');
    Route::post('them-gio-hang', 'store')->name('home.store');
    Route::get('/{id}', 'show')->name('home.show');
});

Route::prefix('admin')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('tongquan', [
            'uses' => 'index',
            'as' => 'tongquan.index',
            'middleware' => 'can:list-dashboard',
        ]);
        Route::get('module', [
            'uses' => 'create',
            'as' => 'tongquan.create',
            'middleware' => 'can:add-dashboard',
        ]);
        Route::post('module/store', [
            'uses' => 'store',
            'as' => 'tongquan.store',
            'middleware' => 'can:add-dashboard',
        ]);
    });
    Route::prefix('taikhoan')->controller(UsersController::class)->group(function () {
        Route::get('/', [
            'uses' => 'index',
            'as' => 'taikhoan.index',
            'middleware' => 'can:list-user',
        ]);
        Route::get('/create', [
            'uses' => 'create',
            'as' => 'taikhoan.create',
            'middleware' => 'can:add-user',
        ]);
        Route::post('/store', [
            'uses' => 'store',
            'as' => 'taikhoan.store',
            'middleware' => 'can:add-user',
        ]);
        Route::get('/{id}', [
            'uses' => 'show',
            'as' => 'taikhoan.show',
            'middleware' => 'can:edit-user',
        ]);
        Route::put('/update/{id}', [
            'uses' => 'update',
            'as' => 'taikhoan.update',
            'middleware' => 'can:edit-user',
        ]);
        Route::delete('/delete/{id}', [
            'uses' => 'destroy',
            'as' => 'taikhoan.destroy',
            'middleware' => 'can:delete-user',
        ]);

    });
    Route::prefix('theloai')->controller(CategoriesController::class)->group(function () {
        Route::get('/', [
            'uses' => 'index',
            'as' => 'theloai.index',
            'middleware' => 'can:list-category',
        ]);
        Route::get('/create', [
            'uses' => 'create',
            'as' => 'theloai.create',
            'middleware' => 'can:add-category',
        ]);
        Route::post('/store', [
            'uses' => 'store',
            'as' => 'theloai.store',
            'middleware' => 'can:add-category',
        ]);
        Route::get('/{id}', [
            'uses' => 'show',
            'as' => 'theloai.show',
            'middleware' => 'can:edit-category',
        ]);
        Route::put('/update/{id}', [
            'uses' => 'update',
            'as' => 'theloai.update',
            'middleware' => 'can:edit-category',
        ]);
        Route::delete('/delete/{id}', [
            'uses' => 'destroy',
            'as' => 'theloai.destroy',
            'middleware' => 'can:delete-category',
        ]);

    });
    Route::prefix('sanpham')->controller(ProductsController::class)->group(function () {
        Route::get('/', [
            'uses' => 'index',
            'as' => 'sanpham.index',
            'middleware' => 'can:list-product',
        ]);
        Route::get('/create', [
            'uses' => 'create',
            'as' => 'sanpham.create',
            'middleware' => 'can:add-product',
        ]);
        Route::post('/store', [
            'uses' => 'store',
            'as' => 'sanpham.store',
            'middleware' => 'can:add-product',
        ]);
        Route::get('/{id}', [
            'uses' => 'show',
            'as' => 'sanpham.show',
            'middleware' => 'can:edit-product',
        ]);
        Route::put('/update/{id}', [
            'uses' => 'update',
            'as' => 'sanpham.update',
            'middleware' => 'can:edit-product',
        ]);
        Route::delete('/delete/{id}', [
            'uses' => 'destroy',
            'as' => 'sanpham.destroy',
            'middleware' => 'can:delete-product',
        ]);

    });
    Route::prefix('donhang')->controller(OrdersController::class)->group(function () {
        Route::get('/', [
            'uses' => 'index',
            'as' => 'donhang.index',
            'middleware' => 'can:list-order',
        ]);
        Route::get('/create', [
            'uses' => 'create',
            'as' => 'donhang.create',
            'middleware' => 'can:add-order',
        ]);
        Route::post('/store', [
            'uses' => 'store',
            'as' => 'donhang.store',
            'middleware' => 'can:add-order',
        ]);
        Route::get('/{id}', [
            'uses' => 'show',
            'as' => 'donhang.show',
            'middleware' => 'can:edit-order',
        ]);
        Route::put('/update/{id}', [
            'uses' => 'update',
            'as' => 'donhang.update',
            'middleware' => 'can:edit-order',
        ]);

    });
    Route::prefix('giamgia')->controller(CouponController::class)->group(function () {
        Route::get('/', [
            'uses' => 'index',
            'as' => 'giamgia.index',
            'middleware' => 'can:list-discount',
        ]);
        Route::get('/create', [
            'uses' => 'create',
            'as' => 'giamgia.create',
            'middleware' => 'can:add-discount',
        ]);
        Route::post('/store', [
            'uses' => 'store',
            'as' => 'giamgia.store',
            'middleware' => 'can:add-discount',
        ]);
        Route::get('/{id}', [
            'uses' => 'show',
            'as' => 'giamgia.show',
            'middleware' => 'can:edit-discount',
        ]);
        Route::put('/update/{id}', [
            'uses' => 'update',
            'as' => 'giamgia.update',
            'middleware' => 'can:edit-discount',
        ]);
        Route::delete('/delete/{id}', [
            'uses' => 'destroy',
            'as' => 'giamgia.destroy',
            'middleware' => 'can:delete-discount',
        ]);

    });
    Route::prefix('slider')->controller(SliderController::class)->group(function () {
        Route::get('/', [
            'uses' => 'index',
            'as' => 'slider.index',
            'middleware' => 'can:list-slider',
        ]);
        Route::get('/create', [
            'uses' => 'create',
            'as' => 'slider.create',
            'middleware' => 'can:add-slider',
        ]);
        Route::post('/store', [
            'uses' => 'store',
            'as' => 'slider.store',
            'middleware' => 'can:add-slider',
        ]);
        Route::get('/{id}', [
            'uses' => 'show',
            'as' => 'slider.show',
            'middleware' => 'can:edit-slider',
        ]);
        Route::put('/update/{id}', [
            'uses' => 'update',
            'as' => 'slider.update',
            'middleware' => 'can:edit-slider',
        ]);
        Route::delete('/delete/{id}', [
            'uses' => 'destroy',
            'as' => 'slider.destroy',
            'middleware' => 'can:delete-slider',
        ]);

    });
    Route::prefix('vaitro')->controller(RoleController::class)->group(function () {
        Route::get('/', [
            'uses' => 'index',
            'as' => 'vaitro.index',
            'middleware' => 'can:list-role',
        ]);
        Route::get('/create', [
            'uses' => 'create',
            'as' => 'vaitro.create',
            'middleware' => 'can:add-role',
        ]);
        Route::post('/store', [
            'uses' => 'store',
            'as' => 'vaitro.store',
            'middleware' => 'can:add-role',
        ]);
        Route::get('/{id}', [
            'uses' => 'show',
            'as' => 'vaitro.show',
            'middleware' => 'can:edit-role',
        ]);
        Route::put('/update/{id}', [
            'uses' => 'update',
            'as' => 'vaitro.update',
            'middleware' => 'can:edit-role',
        ]);
        Route::delete('/delete/{id}', [
            'uses' => 'destroy',
            'as' => 'vaitro.destroy',
            'middleware' => 'can:delete-role',
        ]);

    });
    Route::controller(AuthController::class)->group(function () {
        Route::get('login', [
            'uses' => 'index',
            'as' => 'auth.index',
        ]);
        Route::get('register', [
            'uses' => 'create',
            'as' => 'auth.create',
        ]);
        Route::post('auth/store', [
            'uses' => 'store',
            'as' => 'auth.store',
        ]);

    });
    // Route::resource('tongquan', DashboardController::class);
    // Route::resource('taikhoan', UsersController::class);
    // Route::resource('theloai', CategoriesController::class);
    // Route::resource('sanpham', ProductsController::class);
    // Route::resource('donhang', OrdersController::class);
    // Route::resource('giamgia', CouponController::class);
    // Route::resource('slider', SliderController::class);
    Route::resource('baiviet', PostsController::class);
    // Route::resource('vaitro', RoleController::class);

    // Route::resource('menu', MenuController::class);
});
