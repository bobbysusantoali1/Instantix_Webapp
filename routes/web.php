<?php

use App\Http\Controllers\HomePage;
use App\Http\Controllers\LoginPage;
use App\Http\Controllers\BrowsePage;
use App\Http\Controllers\ContactPage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterPage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\AddNewEventPage;
use App\Http\Controllers\EventDetailPage;
use App\Http\Controllers\ManageEventPage;
use App\Http\Controllers\EventBookingPage;
use App\Http\Controllers\AboutUsPage;
use App\Http\Controllers\EOPage;

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

// universal
Route::get('/', function () {
    return redirect('/HomePage');
});
Route::get('/HomePage', [HomePage::class, 'view']);
Route::get('/Browse', [BrowsePage::class, 'view']);
Route::get('/Contact', [ContactPage::class, 'view']);
Route::get('/EventDetail/customer/{id}', [EventDetailPage::class, 'view']);
Route::get('/AboutUs', [AboutUsPage::class, 'view']);


// for guest
Route::middleware('guest')->group(function(){
    Route::get('/Login', [LoginPage::class, 'view'])->name('login');
    Route::post('/Login', [LoginPage::class, 'authenticate']);
    Route::get('/Register', [RegisterPage::class, 'view']);
    Route::Post('/Register', [RegisterPage::class, 'insert']);
});

// for auth user
Route::middleware('auth')->group(function(){
    // for customer
    Route::middleware('customer')->group(function(){
        Route::get('/EventDetail/customer/{id}', [EventDetailPage::class, 'view']);
        Route::post('/EventDetail/customer/{id}', [EventBookingPage::class, 'view']);
    });

    // for EO
    Route::middleware('eventOrganizer')->group(function(){
        Route::get('/AddNewEvent', [AddNewEventPage::class, 'view']);
        Route::post('/AddNewEvent', [AddNewEventPage::class, 'insert']);
        // Route::get('/AddNewEvent', [
        //     AddNewEventPage::class, 'view'
        // ]);
        Route::get('/ManageEvent', [
            ManageEventPage::class, 'view'
        ]);
    });

    Route::post('/Logout', [LoginPage::class, 'Logout']);
});

// get url image without storage:link
Route::get('/storage/app/public/images/{nama}', function($nama){
    $content = Storage::get('/public/images/'.$nama);
    $mimes = Storage::mimeType('/public/images/'.$nama);
    $response = Response::make($content, 200);
    $response->header('Content-Type', $mimes);
    return $response;
});
