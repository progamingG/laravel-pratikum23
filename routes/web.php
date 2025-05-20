<?php

use App\Http\Controllers\TokoController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::view('/', 'welcome', ['user'=> 'hello word']);


Route::get("/loginuser", [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post("/loginuser", [UserController::class, 'loginUser']);
Route::get("/logout", [UserController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource("user", UserController::class);
    Route::resource("toko", TokoController::class);
    Route::get('/approve', [TokoController::class, 'notapprovetoko'])->name('approve.index');
    Route::put('/approve/{toko}', [TokoController::class, 'approveToko'])->name('approve.toko');
});


require __DIR__ . '/auth.php';




// Route::get("/home",function (Request $request){
//     return view('home');
// });

// Route::get("/about",function (Request $request){
//     return view('home');
// });

// Route::get("/contak",function (Request $request){
//     return view('home');
// });