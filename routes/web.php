<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

use App\Http\Controllers\Admins\AdminController;
use App\Http\Controllers\Admins\CategoryController;
use App\Http\Controllers\Admins\AdProductController;
use App\Http\Controllers\Admins\AdOrderController;
use App\Http\Controllers\Admins\AdBlogController;
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
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index',])->name('home');
Route::get('/search', [HomeController::class, 'searchHome',])->name('search');


// đăng nhập, đăng ký
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('signup');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('signin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// thông tin tài khoản
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');

//  sản phẩm
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/shop/{id}', [ShopController::class, 'getShopByCate'])->name('shop-cate');
Route::get('/product/{id}', [ProductDetailController::class, 'index'])->name('product-detail');

// chi tiết bài viết
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/blog/{id}', [BlogController::class, 'blogDetail'])->name('blog-detail');

//giỏ hàng
Route::get('/cart', [CartController::class, 'index',])->name('cart');
Route::post('/cart/add', [CartController::class, 'create'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/delete/{id}', [CartController::class, 'destroy'])->name('cart.delete');

//thanh toán
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [OrderController::class, 'create'])->name('checkout.add');


//admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::get('/admin/category', [AdminController::class, 'category'])->name('admin.category');
Route::get('/admin/category/add', [AdminController::class, 'createCategory'])->name('category.create');
Route::post('/admin/category/add', [CategoryController::class, 'add'])->name('category.add');
Route::get('/admin/category/cateDetail/{id}', [AdminController::class, 'detailCategory'])->name('category.detail');
Route::post('/admin/category/update', [CategoryController::class, 'update'])->name('category.update');
Route::get('/admin/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

Route::get('/admin/product', [AdminController::class, 'product'])->name('admin.product');
Route::get('/admin/product/add', [AdminController::class, 'createProduct'])->name('product.create');
Route::post('/admin/product/add', [AdProductController::class, 'add'])->name('product.add');
Route::get('/admin/product/productDetail/{id}', [AdminController::class, 'detailProduct'])->name('product.detail');
Route::post('/admin/product/update', [AdProductController::class, 'update'])->name('product.update');
Route::get('/admin/product/delete/{id}', [AdProductController::class, 'delete'])->name('product.delete');


Route::get('/admin/order', [AdminController::class, 'order'])->name('admin.order');
Route::get('/admin/order/orderDetail/{orderID}', [AdminController::class, 'detailOrder'])->name('order.detail');
Route::post('/admin/order/update', [AdOrderController::class, 'update'])->name('order.update');

Route::get('/admin/blog', [AdminController::class, 'blog'])->name('admin.blog');
Route::get('/admin/blog/add', [AdminController::class, 'createBlog'])->name('blog.create');
Route::post('/admin/blog/add', [AdBlogController::class, 'add'])->name('blog.add');
Route::get('/admin/blog/blogDetail/{id}', [AdminController::class, 'detailBlog'])->name('blog.detail');
Route::post('/admin/blog/update', [AdBlogController::class, 'update'])->name('blog.update');
Route::get('/admin/blog/delete/{id}', [AdBlogController::class, 'delete'])->name('blog.delete');
