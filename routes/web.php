<?php

use App\Http\Controllers\Admin\AdminCommentController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminFavoriteController;
use App\Http\Controllers\Admin\ApprovalController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\AllPostController;
use App\Http\Controllers\Author\AuthorCommentController;
use App\Http\Controllers\Author\AuthorDashboardController;
use App\Http\Controllers\Author\AuthorFavoriteController;
use App\Http\Controllers\Author\AuthorPostController;
use App\Http\Controllers\Author\ProfileController;
use App\Http\Controllers\AuthorProfileController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FevoriteController;
use App\Http\Controllers\FrontSubscriberController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SinglePostController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

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

Auth::routes();

Route::get('/',[HomeController::class,'loadHome'])->name('home');
Route::post('/subscriber',[FrontSubscriberController::class,'store'])->name('subscriber');
Route::get('/category/{slug}',[HomeController::class,'categoryPost'])->name('category.post');
Route::get('/tag/{slug}',[HomeController::class,'tagByPost'])->name('tagByPost');
Route::get('/single-post/{slug}',[SinglePostController::class,'singlePost'])->name('singlePost');
//All Post Route
Route::get('/all-post',[AllPostController::class,'index'])->name('allPost');
//Search For Route
Route::get('/search',[SearchController::class,'index'])->name('search');
//Author Profile Route
Route::get('/profile/{username}',[AuthorProfileController::class,'profile'])->name('authorProfile');

Route::group(['middleware'=>'auth'],function (){
    Route::post('/favorite/{post}/add',[FevoriteController::class,'add'])->name('post.favorite');
    Route::post('/comment/{post}',[CommentController::class,'store'])->name('comment.store');
});

//Admin Routing Group
Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>['auth','admin']],function (){
//    Load Admin Dashboard
    Route::get('/dashboard',[AdminDashboardController::class,'index'])->name('dashboard');
//    Tag For Route
    Route::resource('/tag',TagController::class);
//    Category for Route
    Route::resource('/category',CategoryController::class);
//    Post for Route
    Route::resource('/post',PostController::class);
//    Approval Post For Route
    Route::get('/pending/post',[ApprovalController::class,'pending'])->name('pending');
    Route::put('/post/{id}/approve',[ApprovalController::class,'approve'])->name('approve');
//    Subscriber For Route
    Route::get('/subscriber',[SubscriberController::class,'index'])->name('subscriber.index');
    Route::delete('/subscriber/delete/{id}',[SubscriberController::class,'destroy'])->name('subscriber.destroy');
//    Settings For Route
    Route::get('/profile',[SettingsController::class,'index'])->name('settings.index');
    Route::put('/profile/update',[SettingsController::class,'update'])->name('update.profile');
//    Password Change Route
    Route::get('/password/index',[SettingsController::class,'passwordFrom'])->name('password.change');
    Route::put('/password/check',[SettingsController::class,'passwordCheck'])->name('password.check');
//    Favorite For Route
    Route::get('/favorite',[AdminFavoriteController::class,'getFavorite'])->name('favorite');
//    Comment For Route
    Route::get('/comment',[AdminCommentController::class,'index'])->name('comment.index');
    Route::delete('/comment/delete/{id}',[AdminCommentController::class,'destroy'])->name('comment.destroy');
//    Route For Author Information
    Route::get('/authors',[AuthorController::class,'show'])->name('author.show');
    Route::delete('/author/delete',[AuthorController::class,'delete'])->name('author.delete');
});


//Author Routing Group
Route::group(['prefix'=>'author','as'=>'author.','middleware'=>['auth','author']],function (){
//    Route For Dashboard
    Route::get('/dashboard',[AuthorDashboardController::class,'index'])->name('dashboard');
//    Route For Author Post
    Route::resource('/post',AuthorPostController::class);
//    Author Profile Edit And Update Route
    Route::get('/profile',[ProfileController::class,'index'])->name('profile');
    Route::put('/profile/update',[ProfileController::class,'update'])->name('update.profile');
//    Change Password Author
    Route::get('/password/index',[ProfileController::class,'passwordFrom'])->name('password.change');
    Route::put('/password/check',[ProfileController::class,'passwordCheck'])->name('password.check');
//    Favorite List Author
    Route::get('/favorite',[AuthorFavoriteController::class,'getFavorite'])->name('favorite');
//    Comment For Route
    Route::get('/comment',[AuthorCommentController::class,'index'])->name('comment.index');
    Route::delete('/comment/delete/{id}',[AdminCommentController::class,'destroy'])->name('comment.destroy');

});

View::composer('Frontend.includes.footer',function ($view){
    $view->with('categories',Category::all());
});
































