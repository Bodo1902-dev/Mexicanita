<?php
use Illuminate\Support\Facades\Route;

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
    return view('index');
});
Route::get('/hola', function () {
    return view('/admin/products/index');
})->name('Holita');

Route::resource(('/products'), App\Http\Controllers\ProductController::class);
Route::resource(('/brands'), App\Http\Controllers\BrandController::class);
Route::resource(('/clients'), App\Http\Controllers\ClientController::class);
Route::resource(('/sales'), App\Http\Controllers\SaleController::class);
Route::resource(('/addresses'), App\Http\Controllers\AddressController::class);

//rutas de registro de login
Route::get('/register',[App\Http\Controllers\Auth\RegisterController::class,'show'])->name('register');
Route::post('/register',[App\Http\Controllers\Auth\RegisterController::class,'handle'])->name('register.handle');

//rutas de login
Route::get('/login',[App\Http\Controllers\Auth\LoginController::class,'show'])->name('login');
Route::post('/login',[App\Http\Controllers\Auth\LoginController::class,'handle'])->name('login.handle');

//rutas de Logout
Route::post('/login',[App\Http\Controllers\Auth\LogoutController::class,'handle'])->name('logout');

//Middleware de control 
Route::middleware(['auth'])->group(function(){
    Route::get('/products',[App\Http\Controllers\ProductController::class,'index'])
    ->name('products.index');
});

// Route::get('/products',[App\Http\Controllers\ProductController::class,'index'])
// ->name('products.index');

// Route::get('/products/create',[App\Http\Controllers\ProductController::class,'create'])
// ->name('products.create');

// Route::post('/products',[App\Http\Controllers\ProductController::class,'store'])
// ->name('products.store');

// Route::get('/products/{product}',[App\Http\Controllers\ProductController::class,'show'])
// ->name('products.show');

// Route::delete('/products/{product}',[App\Http\Controllers\ProductController::class,'edit'])
// ->name('products.edit');

// Route::patch('/products/{product}',[App\Http\Controllers\ProductController::class,'update'])
// ->name('products.update');

// Route::delete('/products/{product}',[App\Http\Controllers\ProductController::class,'destroy'])
// ->name('products.destroy');

Route::get('/products/{product}/delete',[App\Http\Controllers\ProductController::class,
'delete'])->name('products.delete'); //esto es una ruta personalizada para acceder a las funciones que se crean en el controlador.
