<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;

use App\Http\Livewire\CheckoutComponent;

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

//Route::get('/', function () {
    //return view('welcome');
//});

//Route::middleware(['auth:sanctum', 'verified'])->get('/user/dashboard', function () {
    //return view('dashboard');
//})->name('dashboard');
//Route::get('/contact',[PagesController::class,'contact'])->name('contact');
//Route::middleware(['auth:sanctum', 'verified','authadmin'])->get('/admin/dashboard', function () {
   //return view('admin.dashboard');
//})->name('admin.dashboard');
Route::get('/',HomeComponent::class);

Route::get('/shop',ShopComponent::class);
Route::get('/cart',CartComponent::class)->name('product.cart');
Route::get('/checkout',CheckoutComponent::class);
Route::get('/product/{slug}',DetailsComponent::class)->name('product.details');
Route::get('/product-category/{category_slug}',DetailsComponent::class)->name('product.category');

//For User or Customer
Route::middleware(['auth:sanctum','verified'])->group(function(){
 Route::get('user/dashboard',UserDashboardComponent::class)->name('user.dashboard');

});

//For admin
Route::middleware(['auth:sanctum','verified','authadmin'])->group(function(){
  Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');

});
