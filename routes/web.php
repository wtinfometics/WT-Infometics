<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('User.index');
});

Route::get('/about', function () {
    return view('User.about');
});

Route::get('/contact', function () {
    return view('User.contact');
});

Route::get('/services', function () {
    return view('User.services');
});

Route::get('/blogs', function () {
    return view('User.blogs');
});

Route::get('/blog-details', function () {
    return view('User.blog-details');
});



//Admin Route
Route::get('/dashboard', function () {
    return view('Admin.Pages.dashboard');
});

Route::get('/posts', function () {
    return view('Admin.Pages.posts');
});

Route::get('/projects', function () {
    return view('Admin.Pages.projects');
});

Route::get('/contacts', function () {
    return view('Admin.Pages.contacts');
});

Route::get('/enquires', function () {
    return view('Admin.Pages.enquires');
});

Route::get('/testimonials', function () {
    return view('Admin.Pages.testimonials');
});

Route::get('/categories', function () {
    return view('Admin.Pages.categories');
});


Route::get('/profile', function () {
    return view('Admin.Pages.profile');
});

Route::get('/addproject', function () {
    return view('Admin.Pages.add-project');
});

Route::get('/addpost', function () {
    return view('Admin.Pages.add-post');
});

Route::get('/addtestimonial', function () {
    return view('Admin.Pages.add-testimonial');
});

Route::get('/addcategory', function () {
    return view('Admin.Pages.add-category');
});


    Route::post('/category', [CategoryController::class, 'store'])
    ->name('category.store');

Route::post('/category/update/{id}', [CategoryController::class, 'update'])
    ->name('category.update');