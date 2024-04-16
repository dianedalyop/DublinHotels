<?php
use App\Http\Controllers\HotelCRUDController;

Route::resource('hotels', HotelCRUDController::class);

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
