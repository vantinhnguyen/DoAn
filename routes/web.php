<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductDetailController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\fe\HomeController;
use App\Http\Controllers\fe\UserController;
use App\Http\Controllers\fe\CartController;
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

//route phần admin
Route::middleware(['admin'])->prefix('admin')->group(function () {
    
    //phần danh mục
    Route::get('/', [AdminController::class, 'index'])->name('Admin.index');
    Route::get('category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('add-category', [CategoryController::class, 'add'])->name('category.add');
    Route::post('add-category', [CategoryController::class, 'create']);
    Route::get('edit-category/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('edit-category/{id}', [CategoryController::class, 'update']);
    Route::get('del-category/{id}', [CategoryController::class, 'del'])->name('category.del');

    //phần sản phẩm
    Route::resource('product', ProductController::class);

    //phần màu
    Route::resource('color', ColorController::class);
    
    //phần size
    Route::resource('size', SizeController::class);
    
    //phần biến thể sản phẩm
    Route::resource('product_detail', ProductDetailController::class);

    //phần quản lý đơn hàng
    Route::resource('order', OrderController::class);

    //phần quản lý tài khoản
    Route::resource('account', AccountController::class);
});

//phần fronend
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/ve-chung-toi', [HomeController::class, 'veChungToi'])->name('home.veChungToi');
Route::get('/product', [HomeController::class, 'product'])->name('home.product');
Route::get('/product/{name}', [HomeController::class, 'productFilter'])->name('home.productFilter');
Route::get('/product_detail/{id}', [HomeController::class, 'product_detail'])->name('home.product_detail');
Route::get('/dai-ly', [HomeController::class, 'daiLy'])->name('home.daiLy');
Route::get('/chinh-sach', [HomeController::class, 'chinhSach'])->name('home.chinhSach');
Route::get('/blogs', [HomeController::class, 'blogs'])->name('home.blogs');
Route::get('/tuyen-dung', [HomeController::class, 'tuyenDung'])->name('home.tuyenDung');
Route::get('/lien-he', [HomeController::class, 'lienHe'])->name('home.lienHe');

Route::get('/login', [HomeController::class, 'login'])->name('home.login');
Route::get('/logon', [HomeController::class, 'logon'])->name('home.logon');
Route::post('/login', [HomeController::class, 'loginAdd'])->name('home.loginAdd');
Route::post('/logon', [HomeController::class, 'logonAdd'])->name('home.logonAdd');
Route::get('/logout', [HomeController::class, 'logout'])->name('home.logout');
Route::get('/register', [HomeController::class, 'register'])->name('home.register');
Route::post('/register', [HomeController::class, 'registerAdd'])->name('home.registerAdd');
Route::get('/info', [HomeController::class, 'info'])->name('home.info');
Route::post('/infoUpdate/{id}', [HomeController::class, 'infoUpdate'])->name('home.infoUpdate');
Route::get('/password', [HomeController::class, 'password'])->name('home.password');
Route::post('/passwordEdit', [HomeController::class, 'passwordEdit'])->name('home.passwordEdit');

//Cart contrller
Route::post('/cartAdd', [CartController::class, 'Add'])->name('cart.Add');
Route::get('/cart', [CartController::class, 'Show'])->name('cart.Show');
Route::post('/cartUpdate', [CartController::class, 'Update'])->name('cart.Update');
Route::post('/cartDel', [CartController::class, 'Del'])->name('cart.del');
Route::get('/checkout', [CartController::class, 'Checkout'])->name('cart.checkout');
Route::post('/checkout', [CartController::class, 'CheckoutAdd'])->name('cart.checkoutAdd');
Route::get('/ordered', [CartController::class, 'ordered'])->name('cart.ordered');
Route::post('/ordered-del', [CartController::class, 'orderedDel'])->name('cart.orderedDel');