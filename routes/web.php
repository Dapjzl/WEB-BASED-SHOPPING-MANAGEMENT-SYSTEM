<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\BackendController;
use App\Http\Controllers\Admin\ProcessController;

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




// Route::get('/', function () {
//     return view('front.layouts.home');
// })->name('front');


Route::get('login', function () {
    return view('auth.login');
});


//Prevent logged in user from access login or Auth pages
Route::middleware(['middleware' => 'preventBackHistory'])->group(function () {
    Auth::routes();
});


// Route::get('/dashboard', function (){
//     return view('front.front');
// })->middleware(['auth', 'role:user', 'preventBackHistory'])->name('user-dashboard');


Route::get('/', [FrontController::class, 'index'])->name('front');
Route::get('/category/{id}/{slug}', [FrontController::class, 'category'])->name('front.category');
Route::get('/product-page/{id}/{slug}', [FrontController::class, 'productpage'])->name('front.product-page');
Route::get('/single-product/{id}/{slug}', [FrontController::class, 'singleproduct'])->name('front.single-product');
Route::get('/new-release', [FrontController::class, 'newrelease'])->name('front.new-release');
Route::get('/todays-deal', [FrontController::class, 'todaysdeal'])->name('front.todays-deal');
Route::get('/blog', [FrontController::class, 'blog'])->name('front.blog');
Route::get('/customer-service', [FrontController::class, 'service'])->name('front.customer-service');



Route::group(['prefix' => 'system', 'middleware' => ['auth', 'role:user', 'preventBackHistory',]],  function (){

    Route::get('/user-dashboard', [FrontController::class, 'dashboard'])->name('front.front');
    Route::get('/single-profile', [FrontController::class, 'single'])->name('front.single-profile');
    Route::get('/pending-order', [FrontController::class, 'pendingorder'])->name('front.pending-order');
    Route::get('/single-profile/history', [FrontController::class, 'history'])->name('front.history');
    Route::get('/add-to-cart', [FrontController::class, 'addtocart'])->name('front.addtocart');
    Route::post('/addtocart', [FrontController::class, 'storecart'])->name('storecart');
    Route::get('/removecartitem/{id}', [FrontController::class, 'removecartitem'])->name('removecartitem');
    Route::get('/delivery-address', [FrontController::class, 'getdelivery'])->name('front.deliveryaddress');
    Route::post('/adddeliveryaddress', [FrontController::class, 'storedelivery'])->name('storedelivery');
    Route::get('/checkout', [FrontController::class, 'checkout'])->name('front.checkout');
    Route::post('/placeorder', [FrontController::class, 'storeorder'])->name('storeorder');




});



Route::group(['prefix' => 'system', 'middleware' => ['auth', 'role:admin', 'preventBackHistory',]], function (){

    //Backend Controller
    Route::get('/dashboard', [BackendController::class, 'index'])->name('admin.dashboard');

    Route::get('/addcategory', [BackendController::class, 'addcategory'])->name('admin.addcategory');
    Route::get('/allcategory', [BackendController::class, 'category'])->name('admin.allcategory');
    Route::get('/editcategory/{id}', [BackendController::class, 'editcategory'])->name('admin.editcategory');
    Route::get('/addsubcategory', [BackendController::class, 'addsubcategory'])->name('admin.addsubcategory');
    Route::get('/editsubcategory/{id}', [BackendController::class, 'editsubcategory'])->name('admin.editsubcategory');
    Route::get('/allsubcategory', [BackendController::class, 'subcategory'])->name('admin.allsubcategory');
    Route::get('/addproduct', [BackendController::class, 'addproduct'])->name('admin.addproduct');
    Route::get('/editproduct/{id}', [BackendController::class, 'editproduct'])->name('admin.editproduct');
    Route::get('/allproduct', [BackendController::class, 'product'])->name('admin.allproduct');
    Route::get('/pending-order', [BackendController::class, 'pendingorder'])->name('admin.pendingorder');





    //Process Controller

    Route::post('/addcategory', [ProcessController::class, 'storecategory'])->name('storecategory');
    Route::post('/editcategory', [ProcessController::class, 'updatecategory'])->name('updatecategory');
    Route::get('/deletecategory/{id}', [ProcessController::class, 'deletecategory'])->name('deletecategory');
    Route::post('/addsubcategory', [ProcessController::class, 'storesubcategory'])->name('storesubcategory');
    Route::post('/editsubcategory', [ProcessController::class, 'updatesubcategory'])->name('updatesubcategory');
    Route::get('/deletesubcategory/{id}', [ProcessController::class, 'deletesubcategory'])->name('deletesubcategory');
    Route::post('/addproduct', [ProcessController::class, 'storeproduct'])->name('storeproduct');
    Route::post('/editproduct', [ProcessController::class, 'updateproduct'])->name('updateproduct');
    Route::get('/deleteproduct/{id}', [ProcessController::class, 'deleteproduct'])->name('deleteproduct');
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';
