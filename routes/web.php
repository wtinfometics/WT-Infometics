<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestimonialController;

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

Route::get('/profile', function () {
    return view('Admin.Pages.profile');
});



    Route::post('/category', [CategoryController::class, 'store'])
    ->name('category.store');

Route::post('/category/update/{id}', [CategoryController::class, 'update'])
    ->name('category.update');

    Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');



    Route::post('/enquiry', [EnquiryController::class, 'store'])
    ->name('enquiry.store');

    Route::prefix('admin')->group(function () {
        Route::get('/contacts', [ContactController::class, 'index']);
        Route::get('/contacts/{contact_id}/view', [ContactController::class, 'view']);
        Route::delete('/contacts/{contact_id}', [ContactController::class, 'delete']);
    });

    Route::prefix('admin')->group(function () {
        Route::get('/enquiries', [EnquiryController::class, 'index']);
        Route::get('/enquiries/{enquiry_id}/view', [EnquiryController::class, 'view']);
        Route::delete('/enquiries/{enquiry_id}', [EnquiryController::class, 'delete']);
    });

    Route::prefix('admin')->group(function () {
        Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/categories/create', [CategoryController::class, 'createCategory']);
        Route::post('/categories', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/categories/{category_id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/categories/{category_id}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/categories/{category_id}', [CategoryController::class, 'delete'])->name('category.delete');
    });

    Route::prefix('admin')->group(function () {
        Route::get('/posts', [PostController::class, 'index'])->name('post.index');
        Route::get('/posts/create', [PostController::class, 'indexAddPost']);
        Route::post('/posts', [PostController::class, 'store'])->name('post.store');
        Route::get('/posts/{post_id}/edit', [PostController::class, 'edit'])->name('post.edit');
        Route::post('/posts/{post_id}', [PostController::class, 'update'])->name('post.update');
        Route::delete('/posts/{post_id}', [PostController::class, 'delete'])->name('post.delete');
    });

     Route::prefix('admin')->group(function () {
        Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonial.index');
        Route::get('/testimonials/create', [TestimonialController::class, 'indexAddTestimonial']);
        Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonial.store');
        Route::get('/testimonials/{testimonial_id}/edit', [TestimonialController::class, 'edit'])->name('testimonial.edit');
        Route::post('/testimonials/{testimonial_id}', [TestimonialController::class, 'update'])->name('testimonial.update');
        Route::delete('/testimonials/{testimonial_id}', [TestimonialController::class, 'delete'])->name('testimonial.delete');
    });