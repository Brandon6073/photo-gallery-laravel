<?php

use App\Models\Photo;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PhotoController;

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

Route::get('/', [PhotoController::class, 'index'])->name('index');;

// Route::get('/photos/{id}', function ($id) {

//     $photo = Photo::find($id);

//     if ($photo){
//         return view('photo',[
//             'photo' => $photo
//         ]);
//     } else{
//         abort('404');
//     }

// });

//  Show the create form
Route::get('/photos/create',[PhotoController::class,'create'])->middleware('auth')->name('photos.create');
// go to  middleware> authenticate.php and it will go to login. change login name in route 

//  Store photo data
Route::post('/photos',[PhotoController::class,'store'])->middleware('auth')->name('photos.store');

//  Show edit form
Route::get('/photos/{photo}/edit',[PhotoController::class,'edit'])->middleware('auth')->name('photos.edit');

//  Update Photo detail 
Route::put('/photos/{photo}',[PhotoController::class,'update'])->middleware('auth')->name('photos.update');

//  Delete Photo detail 
Route::delete('/photos/{photo}',[PhotoController::class,'destroy'])->middleware('auth')->name('photos.delete');

// Manage photos
Route::get('/photos/manage',[PhotoController::class,'manage'])->middleware('auth')->name('photos.manage');

// single photo
Route::get('/photos/{photo}',[PhotoController::class,'show'])->name('photos.show');



//!--------------------------------- Users ------------------------

//  show register
Route::get('/register',[UserController::class,'create'])->middleware('guest')->name('users.create');

// Store User data
Route::post('/users',[UserController::class,'store'])->name('users.store');

// Logout
Route::post('/logout',[UserController::class,'logout'])->middleware('auth');
// Show Login Form
Route::get('/login',[UserController::class,'login'])->middleware('guest')->name('users.login');

// Login User
Route::post('/users/authenticate',[UserController::class,'authenticate']);

