<?php

use App\Http\Controllers\Auth\RegisterCaptchaController;
use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'Main'], function () {
    Route::get('/', 'IndexController')->name('main.index');
});

Auth::routes();

Route::group(['namespace' => 'Article', 'prefix' => 'articles'], function () {
    Route::get('/', 'IndexController')->name('article.index');

    Route::group(['prefix' => '{article}'], function () {
        Route::get('/', 'ShowController')->name('article.show');
    });

    Route::group(['namespace' => 'Comment', 'prefix' => 'comments'], function () {
        Route::post('/', 'StoreController')->name('article.comment.store');
    });
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('admin');
    });

    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', 'IndexController')->name('admin.category.index');
        Route::get('/create', 'CreateController')->name('admin.category.create');
        Route::post('/', 'StoreController')->name('admin.category.store');
        Route::get('/{category}', 'ShowController')->name('admin.category.show');
        Route::get('/{category}/edit', 'EditController')->name('admin.category.edit');
        Route::patch('/{category}', 'UpdateController')->name('admin.category.update');
        Route::delete('/{category}', 'DeleteController')->name('admin.category.delete');
    });

    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
        Route::get('/', 'IndexController')->name('admin.tag.index');
        Route::get('/create', 'CreateController')->name('admin.tag.create');
        Route::post('/', 'StoreController')->name('admin.tag.store');
        Route::get('/{tag}', 'ShowController')->name('admin.tag.show');
        Route::get('/{tag}/edit', 'EditController')->name('admin.tag.edit');
        Route::patch('/{tag}', 'UpdateController')->name('admin.tag.update');
        Route::delete('/{tag}', 'DeleteController')->name('admin.tag.delete');
    });

    Route::group(['namespace' => 'Article', 'prefix' => 'articles'], function () {
        Route::get('/', 'IndexController')->name('admin.article.index')->middleware('role:administrator-user|editor-user|author-user|reader-user');
        Route::get('/create', 'CreateController')->name('admin.article.create')->middleware('can:add articles');
        Route::post('/', 'StoreController')->name('admin.article.store')->middleware('can:add articles');
        Route::get('/{article}', 'ShowController')->name('admin.article.show')->middleware('can:show articles');
        Route::get('/{article}/edit', 'EditController')->name('admin.article.edit')->middleware('can:edit articles');
        Route::patch('/{article}', 'UpdateController')->name('admin.article.update')->middleware('can:edit articles');
        Route::delete('/{article}', 'DeleteController')->name('admin.article.delete')->middleware('can:delete articles');
    });

    Route::group(['namespace' => 'Statistics', 'prefix' => 'statistics', 'middleware' => 'role:administrator-user'], function () {
        Route::get('/author', 'AuthorController')->name('admin.statistics.author');
    });
});

Route::get('/register-reload-captcha', [RegisterCaptchaController::class, 'reloadCaptcha']);
