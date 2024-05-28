<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\MembEditController;
use App\Http\Controllers\VolonterController;
use App\Http\Controllers\MainNewsController;
use App\Http\Requests\CreateNewsRequest;
use App\Http\Controllers\CreateNewsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CreateEventController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventUserController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;



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








Route::get('/', [MainNewsController::class, 'open'])->name('main');

Route::get('/info', function () {
    return view('info');
})->name('info');

Route::get('/event', function () {
    return view('event');
})->name('event');

Route::get('/news', function () {
    return view('news');
})->name('news');



Route::get('/event', [EventController::class, 'show'])->name('event');
Route::get('/info-event/{id}', [EventController::class, 'open'])->name('info-event');
Route::get('/news', [NewsController::class, 'show'])->name('news');
Route::get('/new/{id}', [NewsController::class, 'open'])->name('new');



// Route::get('/profile', function () {
//     return view('profile');
// })->name('profile');

Route::get('/profile/{id}', [VolonterController::class, 'show'])->name('profile');

// Route::view('members/edit-profile/{$id}', 'members.edit-profile')->name('members.edit-profile');


Route::get('/members', [MembersController::class, 'index'])->name('members');





Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/members/edit-profile/{id}', [MembEditController::class, 'show'])
        ->name('members.edit-profile')
        ->middleware('auth', 'admin' );

    Route::get('/event/settings-event', [EventController::class, 'showSettings'])
        ->name('event.settings-event')
        ->middleware('auth', 'admin' );


    Route::delete('/event/delete/{id}', [EventController::class, 'deleteEvent'])
        ->name('event.delete')
        ->middleware('auth', 'admin');

    Route::delete('/event/soft-delete/{id}', [EventController::class, 'softDeleteEvent'])
        ->name('event.soft-delete')
        ->middleware('auth', 'admin');

    Route::get('/event/edit-event/{id}', [EventController::class, 'openEdit'])
        ->name('event.edit-event')
        ->middleware('auth', 'admin' );

    Route::post('/event/edit-event/{id}', [EventController::class, 'update'])
        ->name('event.update-event')
        ->middleware('auth', 'admin' );

    Route::post('/members/edit-profile/{id}', [MembEditController::class, 'update'])
        ->name('members.update-profile')
        ->middleware('admin');

    Route::get('/news/news-create', function () {
            return view('news.news-create');
        })->name('news.news-create')
        ->middleware('auth', 'admin' );

    Route::post('/news/news-create', [CreateNewsController::class, 'save'])
        ->name('news.news-create-new')
        ->middleware('auth', 'admin' );

    Route::get('/event/event-create', function () {
            return view('event.event-create');
        })->name('event.event-create')
        ->middleware('auth', 'admin' );

    Route::post('/event/event-create', [CreateEventController::class, 'store'])
        ->name('event.event-create-event')
        ->middleware('auth', 'admin' );

    Route::get('/news/settings-news', [NewsController::class, 'showSettings'])
        ->name('news.settings-news')
        ->middleware('auth', 'admin' );

    Route::get('/news/edit-news/{id}', [NewsController::class, 'editNews'])
        ->name('news.edit-news')
        ->middleware('auth', 'admin' );

    Route::delete('/news/delete/{id}', [NewsController::class, 'deleteNews'])
        ->name('news.delete')
        ->middleware('auth', 'admin' );

    Route::post('/news/edit-news/{id}', [NewsController::class, 'updateNews'])
        ->name('news.update-news')
        ->middleware('auth', 'admin' );


});




Route::name('user.')->group(function(){

    //Route::view('/private', 'private')->middleware('auth')->name('private');
    //Route::view('private/edit', 'private.edit')->middleware('auth')->name('edit');




    Route::get('/login', function(){
        if (Auth::check()){
            return redirect(route('user.private'));
        }
        return view('login');
    })->name('login');

    Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login']);

    // Route::post('/logout', [\App\Http\Controllers\LoginController::class, 'logout']);
    Route::post('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');



    Route::get('/register', function(){
        if (Auth::check()){
            return redirect(route('user.private'));
        }
        return view('register');
    })->name('register');

    Route::post('/register', [\App\Http\Controllers\RegisterController::class, 'save']);
    Route::post('/edit', [\App\Http\Controllers\ProfileController::class, 'update'])->name('user.edit')->middleware('auth');

    Route::get('/private', [ProfileController::class, 'show'])->name('private')->middleware('auth');
    Route::get('/edit', [ProfileController::class, 'edit'])->name('edit')->middleware('auth');

    Route::post('/info-event/{eventId}', [EventUserController::class, 'store'])->name('info-event');
    Route::delete('/info-event/{eventId}', [EventUserController::class, 'cancel'])->name('cancel-event');



});






