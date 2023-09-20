<?php

use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ShowYourBookingsController;
use App\Http\Controllers\UserController;

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

// Dashboard
Route::get('/', [DashboardController::class, 'index']);

// Halaman Home Employee
Route::get('/employee/home/{id}',[RoomController::class,'home'])->name('home.employee');

// Login
Route::get('/login/{clickedDate?}', [SessionController::class, 'dashboardDate'])->name('login');
Route::post('/login',[SessionController::class,'login'])->name('Cobalogin');

// Admin
Route::get('/admin',[SessionController::class,'check']);

// Employees
Route::get('/employee/account/{id}/', [UserController::class, 'index'])->name('employee.account');
Route::post('/update-profile-image', [UserController::class, 'updateProfileImage'])->name('update-profile-image');

// Ke Form (Yang ada Rooms sama Form)
Route::get('/employee/form/{id}/{clickedDate}', [BookingController::class, 'form'])->name('form.employee');
Route::get('/get-bookings', [BookingController::class, 'getBookings'])->name('get.bookings');

// Menyimpan data form ke database
Route::post('/store-booking', [BookingController::class, 'store'])->name('store.booking');

// Your Bookigs
Route::get('/yourbookings/{id}', [ShowYourBookingsController::class, 'yourBookings'])->name('Allbookings');
Route::post('/cancelbooking/{id}', [ShowYourBookingsController::class, 'cancel'])->name('cancelbooking');

// Rooms Admin
    // Data Room
    Route::get('/rooms', [RoomController::class,'index']);
    // Create Room
        // Ke Create Form
        Route::get('/create-room', [RoomController::class,'create']);
        // Menambahkan Room
        Route::post('/insert-room-data', [RoomController::class,'insert']);
    // Update Room
        // Ke Edit Form
        Route::get('/select-room/{id}', [RoomController::class,'select']);
        // Mengupdate Data Room
        Route::post('/update-room/{id}', [RoomController::class,'update']);
    // Delete Room
        Route::get('/delete-room/{id}', [RoomController::class,'delete']);

// Users Admin
    // Data Users
    Route::get('/manage-employees', [UserController::class,'manage']);
    // Create User
        // Ke Create User
        Route::get('/create-user', [UserController::class,'create']);
        // Menambahkan User
        Route::post('/insert-user-data', [UserController::class,'insert']);
    // Update User
        // Ke Edit Form
        Route::get('/select-user/{id}', [UserController::class,'select']);
        // Mengupdate Data User
        Route::post('/update-user/{id}', [UserController::class,'update']);
    // Delete Room
        Route::get('/delete-user/{id}', [UserController::class,'delete']);

// Bookings Admin
    // Data Bookings
    Route::get('/bookings', [BookingController::class,'index']);
    // Memilih Bookings yang di reject dan menampikan halaman form reject
    Route::get('/reject-form/{id}', [BookingController::class,'select']);
    // Reject Bookingsss
    Route::get('/reject-booking/{id}', [BookingController::class,'reject']);

// Autocomplete
    Route::post('/autocomplete-employee/fetch', [UserController::class, 'fetch'])->name('autocomplete-employee.fetch');
    Route::post('/autocomplete-rooms/fetch', [RoomController::class, 'fetch'])->name('autocomplete-rooms.fetch');
    Route::post('/autocomplete-bookings/fetch', [BookingController::class, 'fetch'])->name('autocomplete-bookings.fetch');

