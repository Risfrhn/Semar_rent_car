<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/landing-page', [UserController::class, 'landingPage'])->name('landing');
Route::get('/catalog-page', [CatalogController::class, 'catalogPageUser'])->name('catalog');
Route::get('/blog-page', [BlogController::class, 'blogPageUser'])->name('blog');
Route::get('/blog-page/detail/{id}', [BlogController::class, 'detailByIdUser'])->name('blog-detail');
Route::get('/promo-page', [PromoController::class, 'promoPageUser'])->name('promo');


Route::get('/blog/detail-blog', function () {return view('detailBlogPage');});
Route::get('/tentang-kami', function () {return view('tentangKamiPage');});
Route::get('/login', function () {return view('loginPage');});
Route::get('/login-page', [UserController::class, 'loginPage'])->name('login');


// Admin
// Route login dan logout tetap tanpa middleware
Route::post('/login-system', [UserController::class, 'login'])->name('loginSystem');
Route::post('/admin/logout', [UserController::class, 'logOut'])->name('logOut');

// Semua route admin masuk grup middleware 'auth' (dan opsional 'admin')
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/admin/dashboard-admin', [UserController::class, 'dashboardAdmin'])->name('dashboard-admin');

    // Promo
    Route::get('/admin/promo', [PromoController::class, 'promoPageAdmin'])->name('promo-admin');
    Route::post('/admin/promo/add', [PromoController::class, 'addPromo'])->name('promo-admin-add');
    Route::delete('/admin/promo/delete/{id}', [PromoController::class, 'deletePromo'])->name('promo-admin-delete');
    Route::patch('/admin/promo/edit/{id}', [PromoController::class, 'editPromo'])->name('promo-admin-edit');

    // Blog
    Route::get('/admin/blog', [BlogController::class, 'blogPageAdmin'])->name('blog-admin');
    Route::post('/admin/blog/add', [BlogController::class, 'addBlog'])->name('blog-admin-add');
    Route::delete('/admin/blog/delete/{id}', [BlogController::class, 'deleteBlog'])->name('blog-admin-delete');
    Route::get('/admin/blog/detail/{id}', [BlogController::class, 'detailByIdAdmin'])->name('blog-admin-detail');
    Route::patch('/admin/blog/detail/edit/{id}', [BlogController::class, 'editBlog'])->name('blog-admin-detail-edit');

    // Catalog
    Route::get('/admin/catalog', [CatalogController::class, 'catalogPageAdmin'])->name('catalog-admin');
    Route::post('/admin/catalog/add', [CatalogController::class, 'addCatalog'])->name('catalog-admin-add');
    Route::delete('/admin/catalog/delete/{id}', [CatalogController::class, 'deleteCatalog'])->name('catalog-admin-delete');
    Route::patch('/admin/catalog/edit/{id}', [CatalogController::class, 'editCatalog'])->name('catalog-admin-edit');
});

