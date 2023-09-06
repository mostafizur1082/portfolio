<?php

use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BlogCategoryController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\FooterController;
use App\Http\Controllers\Backend\HomeSlideController;
use App\Http\Controllers\Backend\PortfolioController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('frontend.index');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Admin Controller


Route::controller(AdminController::class)->group(function(){


    Route::get('admin/logout', 'destroy')->name('admin.logout');
    Route::get('admin/profile', 'profile')->name('admin.profile');
    Route::get('edit/profile', 'edit')->name('edit.profile');
    Route::post('update/profile', 'update')->name('update.profile');
    Route::get('change/password', 'changePassword')->name('change.password');
    Route::post('update/password', 'updatePassword')->name('update.password');



});


Route::controller(HomeSlideController::class)->group(function(){
    Route::get('home/slider', 'HomeSlide')->name('home.slider');
    Route::get('add/slider', 'AddHomeSlide')->name('add.slider');
    Route::post('store/slider', 'StoreHomeSlide')->name('store.slider');
    Route::get('edit/slider/{id}', 'EditHomeSlide')->name('edit.slider');
    Route::post('update/slider/{id}', 'UpdateHomeSlide')->name('update.slider');
    Route::get('delete/slider/{id}', 'DeleteHomeSlide')->name('delete.slider');

});

Route::controller(AboutController::class)->group(function(){
    Route::get('about/page', 'AboutPage')->name('about.page');
    Route::post('update/about', 'UpdateAboutPage')->name('update.about');
    Route::get('about', 'About')->name('about');
    Route::get('about/multi/image', 'AboutMultiImage')->name('about.multi.image');
    Route::post('store/multi/image', 'StoreMultiImage')->name('store.multi.image');
    Route::get('all/multi/image', 'AllMultiImage')->name('all.multi.image');
    Route::get('edit/multi/image/{id}', 'EditMultiImage')->name('edit.multi.image');
    Route::post('update/multi/image/{id}', 'UpdateMultiImage')->name('update.multi.image');
    Route::get('delete/multi/image/{id}', 'DeleteMultiImage')->name('delete.multi.image');

});



Route::controller(PortfolioController::class)->group(function(){
    Route::get('all/portfolio', 'AllPortfolio')->name('all.portfolio');
    Route::get('add/portfolio', 'AddPortfolio')->name('add.portfolio');
    Route::post('store/portfolio', 'StorePortfolio')->name('store.portfolio');
    Route::get('edit/portfolio/{id}', 'EditPortfolio')->name('edit.portfolio');
    Route::post('update/portfolio/{id}', 'UpdatePortfolio')->name('update.portfolio');
    Route::get('delete/portfolio/{id}', 'DeletePortfolio')->name('delete.portfolio');
    Route::get('portfolio/details/{id}', 'PortfolioDetails')->name('portfolio.details');
    Route::get('portfolio', 'Portfolio')->name('portfolio');

});

Route::controller(BlogCategoryController::class)->group(function(){
    Route::get('all/blog/category', 'AllblogCategory')->name('all.blog.category');
    Route::get('add/blog/category', 'AddblogCategory')->name('add.blog.category');
    Route::post('store/blog/category', 'StoreblogCategory')->name('store.blog.category');
    Route::get('edit/blog/category/{id}', 'EditblogCategory')->name('edit.blog.category');
    Route::post('update/blog/category/{id}', 'UpdateBlogCategory')->name('update.blog.category');
    Route::get('delete/blog/category/{id}', 'DeleteBlogCategory')->name('delete.blog.category');
});


Route::controller(BlogController::class)->group(function(){
    Route::get('all/blog/', 'AllBlog')->name('all.blog');
    Route::get('add/blog/', 'AddBlog')->name('add.blog');
    Route::post('store/blog/', 'StoreBlog')->name('store.blog');
    Route::get('edit/blog/{id}', 'EditBlog')->name('edit.blog');
    Route::post('update/blog/{id}', 'UpdateBlog')->name('update.blog');
    Route::get('delete/blog/{id}', 'DeleteBlog')->name('delete.blog');
     Route::get('blog/details/{id}', 'BlogDetails')->name('blog.details');
     Route::get('category/blog/{id}', 'CategoryBlog')->name('category.blog');
     Route::get('blog', 'Blog')->name('blog');
});


Route::controller(FooterController::class)->group(function(){
    Route::get('all/footer/', 'AllFooter')->name('all.footer');
    Route::post('update/footer/', 'UpdateFooter')->name('update.footer');
});

Route::controller(ContactController::class)->group(function(){
    Route::get('contact/', 'Contact')->name('contact');
    Route::post('store/message/', 'StoreMessage')->name('store.message');
    Route::get('contact/message/', 'ContactMessage')->name('contact.message');
    Route::get('delete/message/{id}', 'DeleteMessage')->name('delete.message');
});


//End Admin Controller
