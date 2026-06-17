<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\ProjectController;

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
        Route::get('/projects', [ProjectController::class, 'index'])->name('project.index');
        Route::get('/projects/create', [ProjectController::class, 'indexAddProjectPage']);
        Route::post('/projects', [ProjectController::class, 'store'])->name('project.store');
        Route::get('/projects/{project_id}/edit', [ProjectController::class, 'edit'])->name('project.edit');
        Route::post('/projects/{project_id}', [ProjectController::class, 'update'])->name('project.update');
        Route::delete('/projects/{project_id}', [ProjectController::class, 'delete'])->name('project.delete');
    });