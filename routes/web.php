<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Menu;
use App\Livewire\FoodBox;
use Illuminate\Support\Facades\Route;
use App\Livewire\Reviews\Create as ReviewCreate;
use App\Livewire\Reviews\Edit as ReviewEdit;
use App\Livewire\Reviews\MyReviews;
use App\Livewire\Reviews\ViewReviews;
use App\Http\Controllers\ReviewController;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    // Menu
    Route::get('menu/create', Menu\Create::class)->name('menu.create');
    Route::get('menu/view', Menu\View::class)->name('menu.view');
    Route::get('menu/edit/{id}', Menu\Edit::class)->name('menu.edit');

    // FoodBox
    Route::get('food-box/create', FoodBox\Create::class)->name('food-box.create');
    Route::get('food-box/view', FoodBox\View::class)->name('food-box.view');
    Route::get('food-box/edit/{id}', FoodBox\Edit::class)->name('food-box.edit');

    // ✅ Review Routes
    Route::get('/reviews', MyReviews::class)        ->name('reviews.my');
    Route::get('/reviews/create/{food_box_id}', ReviewCreate::class)->name('reviews.create');
    Route::get('/reviews/{review}/edit', ReviewEdit::class)->name('reviews.edit');
    Route::get('/reviews/view', ViewReviews::class) ->name('reviews.view');
});


require __DIR__.'/auth.php';