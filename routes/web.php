<?php

use App\Http\Controllers\HomePage;
use App\Http\Controllers\LoginPage;
use App\Http\Controllers\BrowsePage;
use App\Http\Controllers\ContactPage;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterPage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\AddNewEventPage;
use App\Http\Controllers\EventDetailPage;
use App\Http\Controllers\ManageEventPage;
use App\Http\Controllers\EventBookingPage;
use App\Http\Controllers\MyBookingPage;
use App\Http\Controllers\AboutUsPage;
use App\Http\Controllers\EOPage;
use App\Http\Controllers\EODashboardController;

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
Route::get('/HomePage', [HomePage::class, 'view'])->middleware('loc')->name('view-home');
Route::get('/Browse', [BrowsePage::class, 'view'])->middleware('loc')->name('view-browse');
// Route::get('/Contact', [ContactPage::class, 'view']);
Route::get('/EventDetail/customer/{id}', [EventDetailPage::class, 'view'])->name('view-event');
Route::get('/AboutUs', [AboutUsPage::class, 'view'])->name('view-about-us');
Route::get('/contact-form', [ContactPage::class, 'view'])->name('contact-form');
Route::post('/contact-form', [ContactPage::class, 'ContactUsForm'])->name('contact-form.store');

// for guest
Route::middleware('guest')->group(function(){
    Route::get('/Login', [LoginPage::class, 'view'])->name('login');
    Route::post('/Login', [LoginPage::class, 'authenticate'])->name('authenticate-login');
    Route::get('/Register', [RegisterPage::class, 'view'])->name('register');
    Route::Post('/Register', [RegisterPage::class, 'insert'])->name('insert-register');
});

// for auth user
Route::middleware('auth')->group(function(){
    // for customer
    Route::middleware('customer')->group(function(){
        Route::post('/EventDetail/customer/{id}', [EventBookingPage::class, 'view_book'])->name('view-book-detail');
        Route::post('/EventBooking', [EventBookingPage::class, 'purchase'])->name('purchase-ticket');
        Route::get('/MyBooking', [MyBookingPage::class, 'view'])->name('view-book');
        Route::get('/MyProfile/edit-profile', [ProfileController::class, 'viewEditProfile'])->name('view-edit-profile');
        Route::patch('/MyProfile/edit-profile', [ProfileController::class, 'editProfile'])->name('edit-profile');
    });

    // for EO
    Route::middleware('eventOrganizer')->group(function(){
        Route::prefix('dashboard')->group(function(){
            Route::get('myEvents', [EODashboardController::class, 'myEvents']);

            Route::get('', function (){
                return redirect('/dashboard/myEvents');
            });
        });
        Route::get('/AddNewEvent', [AddNewEventPage::class, 'view'])->name('view-add-event');
        Route::post('/AddNewEvent', [AddNewEventPage::class, 'insert'])->name('insert-event');
        Route::get('/ManageEvent/{id}', [ManageEventPage::class, 'view'])->name('view-manage-event');
        Route::post('/ManageEvent/{id}', [ManageEventPage::class, 'update'])->name('update-event');

    });

    Route::post('/Logout', [LoginPage::class, 'Logout'])->name('logout');
    Route::get('/MyProfile', [ProfileController::class, 'view'])->name('view-profile');
    Route::get('/MyProfile/edit-password', [ProfileController::class, 'viewEditPassword'])->name('view-edit-password');
    Route::patch('/MyProfile/edit-password', [ProfileController::class, 'editPassword'])->name('edit-password');
});

// get url image without storage:link
Route::get('/storage/app/public/images/{nama}', function($nama){
    $content = Storage::get('/public/images/'.$nama);
    $mimes = Storage::mimeType('/public/images/'.$nama);
    $response = Response::make($content, 200);
    $response->header('Content-Type', $mimes);
    return $response;
});
