<?php

use App\Http\Controllers\Buyer\BookmarkController;
use App\Http\Controllers\Buyer\StoreController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public Buyer Routes (Explore, Search & Catalog)
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/explore', [StoreController::class, 'index'])->name('buyer.index');
Route::get('/toko/{slug}', [StoreController::class, 'show'])->name('buyer.stores.show');

Route::get('/top-100', function () {
    $stores = \App\Models\Store::where('is_approved', true)->withCount('products')->orderBy('products_count', 'desc')->take(100)->get();
    return view('buyer.top100', compact('stores'));
})->name('buyer.top100');

Route::post('/api/ask-ai', function (Illuminate\Http\Request $request) {
    $message = strtolower($request->input('message', ''));
    $stores = \App\Models\Store::where('is_approved', true)->take(2)->get();
    
    // Simple mock logic
    $response = "Tentu! Berdasarkan pencarianmu, ini ada beberapa UMKM lokal yang pas banget buat kamu cek:";
    if (str_contains($message, 'makan') || str_contains($message, 'lapar')) {
        $response = "Wah lagi laper ya? Ini aku rekomendasiin tempat makan ter-hits di Tanah Seratus:";
        $stores = \App\Models\Store::where('is_approved', true)->whereHas('products.category', function($q) {
            $q->where('slug', 'makanan');
        })->take(2)->get();
    }
    
    return response()->json([
        'message' => $response,
        'stores' => $stores
    ]);
})->name('api.ask-ai');

// Buyer Authenticated Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $user = auth()->user();
        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->isSeller()) {
            return redirect()->route('seller.dashboard');
        }
        return redirect()->route('buyer.index');
    })->name('dashboard');

    Route::post('/bookmark/{store}', [BookmarkController::class, 'toggle'])->name('buyer.bookmarks.toggle');
    Route::get('/favorit', [BookmarkController::class, 'index'])->name('buyer.bookmarks.index');
});

// Admin Routes
Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    
    // Store Verification
    Route::get('/stores', [\App\Http\Controllers\Admin\StoreApprovalController::class, 'index'])->name('stores.index');
    Route::post('/stores/{store}/approve', [\App\Http\Controllers\Admin\StoreApprovalController::class, 'approve'])->name('stores.approve');
    Route::post('/stores/{store}/reject', [\App\Http\Controllers\Admin\StoreApprovalController::class, 'reject'])->name('stores.reject');

    // Users & Categories (Basic CRUD)
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class)->except(['show']);
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class)->except(['show']);
});

// Seller Routes
Route::middleware(['auth', 'verified', 'role:seller'])->prefix('seller')->name('seller.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Seller\DashboardController::class, 'index'])->name('dashboard');
    
    // Store Management
    Route::get('/store/edit', [\App\Http\Controllers\Seller\StoreController::class, 'edit'])->name('store.edit');
    Route::put('/store', [\App\Http\Controllers\Seller\StoreController::class, 'update'])->name('store.update');
    Route::post('/store/toggle-status', [\App\Http\Controllers\Seller\StoreController::class, 'toggleStatus'])->name('store.toggle-status');

    // Product Management
    Route::resource('products', \App\Http\Controllers\Seller\ProductController::class)->except(['show']);
});

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';