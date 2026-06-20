<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;

 Route::get('/', [HomeController::class, 'index']);
  Route::get('/sitemap.xml', [HomeController::class, 'generateSiteMap']);

    Route::get('/about', function () {
        return view('User.about');
    });

    Route::get('/contact', function () {
        return view('User.contact');
    });

    Route::get('/services', function () {
        return view('User.services');
    });

    Route::get('/blogs', [PostController::class, 'blogs'])->name('blogs.index');
    Route::post('/blogs/search', [PostController::class, 'searchPost'])->name('blogs.search');
    Route::get('/blogs/category/{category_id}', [PostController::class, 'postByCategory'])->name('blogs.category');
    Route::get('/blogs/{post_slug}', [PostController::class, 'blogsDetails'])->name('blogs.details');

 

    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
    Route::post('/enquiry', [EnquiryController::class, 'store'])->name('enquiry.store');

    // Admin Protected Route Starts
    Route::middleware(['admin_auth'])->group(function () {

        Route::prefix('admin')->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'index']);
        });

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
            Route::get('/projects', [ProjectController::class, 'index'])->name('project.index');
            Route::get('/projects/create', [ProjectController::class, 'indexAddProjectPage']);
            Route::post('/projects', [ProjectController::class, 'store'])->name('project.store');
            Route::get('/projects/{project_id}/edit', [ProjectController::class, 'edit'])->name('project.edit');
            Route::post('/projects/{project_id}', [ProjectController::class, 'update'])->name('project.update');
            Route::delete('/projects/{project_id}', [ProjectController::class, 'delete'])->name('project.delete');
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

        Route::prefix('admin')->group(function () {
        Route::get('/logout', [AdminController::class, 'logout']);
        Route::get('/profile', [AdminController::class, 'profile']);
        Route::post('/profile/update', [AdminController::class, 'updateAdmin'])->name('admin.update');
        Route::post('/password/update', [AdminController::class, 'updatePassword'])->name('admin.updatePassword');
        });
            
    });
    // Admin Protected Route Ends

   // Reset Password Route Starts
    Route::middleware(['reset'])->group(function () {

        Route::get('/verify', function () {
            return view('Admin.Pages.verify');
        });

        Route::get('/reset', function () {
            return view('Admin.Pages.reset');
        });

        Route::post('/verify', [AdminController::class, 'verify'])->name('admin.verify');
        Route::post('/reset', [AdminController::class, 'reset'])->name('admin.reset');

    });
   // Reset Password Route Starts

    Route::get('/register', function () {
        return view('Admin.Pages.register');
    });

    Route::get('/login', function () {
        return view('Admin.Pages.login');
    });

    Route::get('/forget', function () {
        return view('Admin.Pages.forget');
    });

    Route::post('/register', [AdminController::class, 'register'])->name('admin.register');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/forget', [AdminController::class, 'forget'])->name('admin.forget');
 