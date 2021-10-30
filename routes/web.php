<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SplProductController;
use App\Http\Controllers\SpOfCategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/logout', function () {
    Session::forget('users');
    return redirect('/');;
});

Route::get('/', [FrontController::class, 'index']);
Route::post('/signup', [UserController::class, 'SignUp']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/products', [FrontController::class, 'show']);
Route::get('/products/{id}', [FrontController::class, 'category'])->name('categories.show');
Route::get('/product_details/{id}', [FrontController::class, 'ProDetails'])->name('product.details');

// Route::post('/add_to_cart',[FrontController::class,'AddToCart']);
Route::post('/add_to_cart', [FrontController::class, 'ADDCART']);
Route::get('/cart', [FrontController::class, 'cartList']);

// Route::get('/cart',[FrontController::class,'orderNow']);
Route::get('/search', [FrontController::class, 'search']);
Route::get('/about', [FrontController::class, 'About']);
Route::get('/checkout', [FrontController::class, 'checkout']);

Route::get('/cart/delete-product/{id}', [FrontController::class, 'deleteCartProduct']);
Route::get('/cart/update-quantity/{id}/{quantity}', [FrontController::class, 'updateCartQuantity']);
Route::get('/get/city/{id}', [FrontController::class, 'getCity']);

// Route::post('/add_cart',[FrontController::class,'addCart']);
Route::group(['middleware' => 'admin_auth'], function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard']);

    //category1
    Route::get('admin/category', [CategoryController::class, 'index']);
    Route::get('admin/addcategory', [CategoryController::class, 'addcategory']);
    Route::post('admin/category_insert', [CategoryController::class, 'insert'])->name('category.insert');
    Route::get('admin/category/delete/{id}', [CategoryController::class, 'delete']);
    Route::get('admin/category/edit/{id}', [CategoryController::class, 'edit']);
    Route::post('admin/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('admin/category/status/{status}/{id}', [CategoryController::class, 'status']);

    //special offer category
    Route::get('admin/sp_of_category', [SpOfCategoryController::class, 'index']);

//coupon routes
    Route::get('admin/coupon', [CouponController::class, 'index']);
    Route::get('admin/addcoupon', [CouponController::class, 'addcoupon']);
    Route::post('admin/coupon_insert', [CouponController::class, 'insert'])->name('coupon.insert');
    Route::get('admin/coupon/delete/{id}', [CouponController::class, 'delete']);
    Route::get('admin/coupon/edit/{id}', [CouponController::class, 'edit']);
    Route::post('admin/coupon/update/{id}', [CouponController::class, 'update'])->name('coupon.update');
    Route::get('admin/coupon/status/{status}/{id}', [CouponController::class, 'status']);

//product routes
    Route::get('admin/product', [ProductController::class, 'index']);
    Route::get('admin/addproduct', [ProductController::class, 'addproduct']);
    Route::post('admin/product_insert', [ProductController::class, 'insert'])->name('product.insert');
    Route::get('admin/product/delete/{id}', [ProductController::class, 'delete']);
    Route::get('admin/product/edit/{id}', [ProductController::class, 'edit']);
    Route::post('admin/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('admin/product/status/{status}/{id}', [ProductController::class, 'status']);

//special product routes
    Route::get('admin/specialproduct', [SplProductController::class, 'index']);
    Route::get('admin/addspecialproduct', [SplProductController::class, 'addproduct']);
    Route::post('admin/specialproduct_insert', [SplProductController::class, 'insert'])->name('splproduct.insert');
    Route::get('admin/specialproduct/delete/{id}', [SplProductController::class, 'delete']);
    Route::get('admin/specialproduct/edit/{id}', [SplProductController::class, 'edit']);
    Route::post('admin/specialproduct/update/{id}', [SplProductController::class, 'update'])->name('product.update');
    Route::get('admin/specialproduct/status/{status}/{id}', [SplProductController::class, 'status']);

// Special Category
    Route::get('admin/spl_category', [SpOfCategoryController::class, 'index']);
    Route::post('admin/insert_special_category', [SpOfCategoryController::class, 'insert'])->name('category.insert_special_category');
    Route::get('admin/showCategory', [SpOfCategoryController::class, 'show_spl_category']);
    Route::get('admin/splcategory/delete/{id}', [SpOfCategoryController::class, 'delete']);
    Route::get('admin/splcategory/edit/{id}', [SpOfCategoryController::class, 'edit']);
    Route::post('admin/splcategory/update/{id}', [SpOfCategoryController::class, 'update'])->name('category.update');
    Route::get('admin/splcategory/status/{status}/{id}', [SpOfCategoryController::class, 'status']);

    //Users Routes
    Route::get('admin/users', [UserController::class, 'UserData']);
    Route::get('admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->flash('error', 'Logout Successfully');
        return redirect('admin');
    });
    // Route::get('admin/updatepassword',[AdminController::class,'updatepassword']);
});
Route::get('admin', [AdminController::class, 'index']);
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');
