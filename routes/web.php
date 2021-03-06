<?php

use App\Http\Controllers\Auth\RegisterCaptchaController;
use Illuminate\Support\Facades\Auth;
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

Route::group(['namespace' => 'Personal', 'prefix' => 'personal', 'middleware' => 'auth'], function () {
    Route::get('/', 'IndexController')->name('personal.main.index');

    Route::group(['namespace' => 'Article', 'prefix' => 'articles'], function () {
        Route::get('/', 'IndexController')->name('personal.article.index');
        Route::get('/create', 'CreateController')->name('personal.article.create');
        Route::post('/', 'StoreController')->name('personal.article.store');
        Route::get('/{article}', 'ShowController')->name('personal.article.show');
        Route::get('/{article}/edit', 'EditController')->name('personal.article.edit');
        Route::patch('/{article}', 'UpdateController')->name('personal.article.update');
        Route::delete('/{article}', 'DeleteController')->name('personal.article.delete');
    });

    Route::group(['namespace' => 'Like', 'prefix' => 'likes'], function () {
        Route::get('/', 'IndexController')->name('personal.like.index');
        Route::delete('/{article}', 'DeleteController')->name('personal.like.delete');
    });

    Route::group(['namespace' => 'Subscriber', 'prefix' => 'subscribers'], function () {
        Route::get('/', 'IndexController')->name('personal.subscriber.index');
        Route::get('/{reader}', 'ShowController')->name('personal.subscriber.show');
    });

    Route::group(['namespace' => 'Subscription', 'prefix' => 'subscriptions'], function () {
        Route::get('/', 'IndexController')->name('personal.subscription.index');

        Route::group(['namespace' => 'Article', 'prefix' => 'articles'], function () {
            Route::get('/', 'IndexController')->name('personal.subscription.article.index');
        });

        Route::group(['prefix' => '{author}'], function () {
            Route::delete('/', 'DeleteController')->name('personal.subscription.delete');
        });
    });

    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        Route::get('/{user}', 'ShowController')->name('personal.user.show');
        Route::get('/{user}/edit', 'EditController')->name('personal.user.edit');
        Route::patch('/{user}', 'UpdateController')->name('personal.user.update');
        Route::get('/{user}/change-password', 'ChangePasswordController')->name('personal.user.change-password');
        Route::patch('/{user}/update-password', 'UpdatePasswordController')->name('personal.user.update-password');
    });

});

Route::group(['namespace' => 'Article', 'prefix' => 'articles'], function () {
    Route::get('/', 'IndexController')->name('article.index');
    Route::get('/comment-reload-captcha', [\App\Http\Controllers\Article\Comment\CaptchaController::class, 'reloadCaptcha']);

    Route::group(['namespace' => 'Reader', 'prefix' => 'readers'], function () {
        Route::get('/', 'IndexController')->name('article.reader.index');

        Route::group(['namespace' => 'Author', 'prefix' => 'authors'], function () {
            Route::group(['prefix' => '{author}'], function () {
                Route::get('/', 'ShowController')->name('article.reader.author.show');

                Route::group(['namespace' => 'Subscription', 'prefix' => 'subscriptions'], function () {
                    Route::post('/', 'StoreController')->name('article.reader.author.subscription.store');
                });
            });

        });
    });

    Route::group(['prefix' => '{article}'], function () {
        Route::get('/', 'ShowController')->name('article.show');

        Route::group(['namespace' => 'Comment', 'prefix' => 'comments'], function () {
            Route::post('/', 'StoreController')->name('article.comment.store')->middleware('can:add comments');
        });

        Route::group(['namespace' => 'Like', 'prefix' => 'likes'], function () {
            Route::post('/', 'StoreController')->name('article.like.store');
        });
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
        Route::get('/', 'IndexController')->name('admin.article.index')->middleware('role:administrator-user|editor-user|author-user|moderator-user|reader-user');
        Route::get('/create', 'CreateController')->name('admin.article.create')->middleware('can:add articles');
        Route::post('/', 'StoreController')->name('admin.article.store')->middleware('can:add articles');
        Route::get('/{article}', 'ShowController')->name('admin.article.show')->middleware('can:show articles');
        Route::get('/{article}/edit', 'EditController')->name('admin.article.edit')->middleware('can:edit articles');
        Route::patch('/{article}', 'UpdateController')->name('admin.article.update')->middleware('can:edit articles');
        Route::delete('/{article}', 'DeleteController')->name('admin.article.delete')->middleware('can:delete articles');
    });

    Route::group(['namespace' => 'Statistics', 'prefix' => 'statistics', 'middleware' => 'role:administrator-user'], function () {
        Route::get('/author', 'AuthorController')->name('admin.statistics.author');
        Route::get('/reader', 'ReaderController')->name('admin.statistics.reader');
    });

    Route::group(['namespace' => 'Comment', 'prefix' => 'comments'], function () {
        Route::get('/', 'IndexController')->name('admin.comment.index')->middleware('role:administrator-user|moderator-user');
        Route::get('/{comment}/edit', 'EditController')->name('admin.comment.edit')->middleware('can:edit comments');
        Route::patch('/{comment}', 'UpdateController')->name('admin.comment.update')->middleware('can:edit comments');
        Route::delete('/{comment}', 'DeleteController')->name('admin.comment.delete')->middleware('can:delete comments');
    });

    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        Route::get('/', 'IndexController')->name('admin.user.index');
        Route::get('/{user}/ban', 'BanController')->name('admin.user.ban')->middleware('can:ban commentators');
        Route::get('/banned', 'BannedController')->name('admin.user.banned');
    });
});

Route::get('/register-reload-captcha', [RegisterCaptchaController::class, 'reloadCaptcha']);

