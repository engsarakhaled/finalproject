<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TopicController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});
//public pages 
Route::group([
    'controller' => PublicController::class,
], function () {
    Route::get('contact', 'contact')->name('contact');
    Route::get('index', 'index')->name('index');
    Route::get('topicsdetail/{id}', 'topicdetail')->name('topicsdetail');
    Route::get('topicsdetail/bookmark/{id}','bookmark')->name('bookmark'); //bookmark
    Route::get('topics/listing', 'topiclisting')->name('topicslisting');                                                       
    Route::get('testimonials', 'testimonial')->name('testimonials');
   });

//admin pages 
 Route::group(['prefix' => 'admin'], function () {
    Route::group([
        'controller' => CategoryController::class,
        'prefix' => 'categories',
        'as' => 'categories.',
       'middleware' => 'verified',

    ], function () {
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('index', 'index')->name('index');
        Route::get('{id}/show', 'show')->name('show');
        Route::get('{id}/edit', 'edit')->name('edit');
        Route::put('{id}/update', 'update')->name('update');
        Route::get('{id}/delete', 'destroy')->name('delete');
     
    });
    Route::group([
        'controller' => TopicController::class,
        'prefix' => 'topics',
        'as' => 'topics.',
       'middleware' => 'verified',
    ], function () {
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('index', 'index')->name('index');
        Route::get('{id}/show', 'show')->name('show');
        Route::get('{id}/edit', 'edit')->name('edit');
        Route::put('{id}/update', 'update')->name('update');
        Route::get('{id}/delete', 'destroy')->name('delete');
     
    });
    Route::group([
        'controller' => TestimonialController::class,
        'prefix' => 'test',
        'as' => 'test.',
       'middleware' => 'verified',
    ], function () {
        Route::get('create', 'create')->name('create');
        Route::get('index', 'index')->name('index');
        Route::post('store', 'store')->name('store');
        Route::get('{id}/edit', 'edit')->name('edit');
        Route::put('{id}/update', 'update')->name('update');
        Route::get('{id}/delete', 'destroy')->name('delete');
    });
  
    Route::group([
        'controller' => UserController::class,
        'prefix' => 'users',
        'as' => 'users.',
        'middleware' => 'verified',
    ], function () {
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('index', 'index')->name('index');
        Route::get('{id}/show', 'show')->name('show');
        Route::get('{id}/edit', 'edit')->name('edit');
        Route::put('{id}/update', 'update')->name('update');
    });

    Route::group([
        'controller' => ContactController::class,
        'prefix' => 'contact',
        'as' => 'contact.',
        'middleware' => 'verified',
    ], function () {
        
        Route::get('messages', 'index')->name('messages');
        Route::get('{id}/show', 'show')->name('show');
        Route::get('{id}/delete', 'destroy')->name('delete');
    });
});

//from public page contact details will store into database and swnd mail to mailtrape
//contact us
Route::post('contactus', [ContactController::class, 'send'])->name('contact.send');
Route::post('contact', [ContactController::class, 'store'])->name('contact.store');

Auth::routes(['verify' => true]); 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
