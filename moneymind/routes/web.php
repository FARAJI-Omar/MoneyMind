<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\RecurringExpenseController;
use App\Http\Controllers\WishListController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SavingGoalController;

use function Pest\Laravel\delete;

Route::get('/', function () {
    return view('homepage');
})->name('homepage');


Route::middleware(['auth'])->group(function () {
    Route::group(['middleware' => function ($request, $next) {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }], function () {
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

        Route::get('/admin/users', [AdminController::class, 'manageUsers'])->name('admin.manageUsers');
        Route::get('/admin/users/{id}', [AdminController::class, 'editUser'])->name('admin.editUser');
        Route::delete('/admin/users/{id}', [AdminController::class, 'destroyUser'])->name('admin.destroyUser');

        Route::get('/admin/categories', [AdminController::class, 'manageCategories'])->name('admin.manageCategories');
        Route::post('/admin/categories', [AdminController::class, 'categoryStore'])->name('categories.store');
        Route::delete('/admin/delete-category/{id}', [AdminController::class, 'categoryDestroy'])->name('categories.destroy');


        // delete
    });
});



Route::middleware(['auth'])->group(function () {
    Route::group(['middleware' => function ($request, $next) {
        if (auth()->user()->role !== 'user') {
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
        Route::post('/settings', [SettingsController::class, 'update'])->name('settings.update');

        Route::post('/settings/update-expense/{id}', [SettingsController::class, 'updatee'])->name('settings.updatee');
        Route::delete('/settings/delete-expense/{id}', [SettingsController::class, 'destroy'])->name('settings.destroy');

        Route::post('/settings/update-wishlist/{id}', [SettingsController::class, 'updateee'])->name('settings.updateee');
        Route::delete('/settings/delete-wishlistitem/{id}', [SettingsController::class, 'destroyy'])->name('settings.destroyy');

        Route::get('/expenses', [ExpenseController::class, 'create'])->name('expenses');
        Route::post('/expenses', [ExpenseController::class, 'store'])->name('expenses.store');

        Route::post('/recurring-expenses', [RecurringExpenseController::class, 'store'])->name('recurring-expenses.store');

        Route::get('/wishlist', [WishListController::class, 'create'])->name('wishlist');
        Route::post('/wishlist', [WishListController::class, 'store'])->name('wishlist.store');

        Route::get('/savingGoal', [SavingGoalController::class, 'create'])->name('savingGoal');
        Route::post('/savingGoal', [SavingGoalController::class, 'store'])->name('savingGoal.store');
        Route::post('/savingGoal/update/{id}', [SavingGoalController::class, 'update'])->name('savingGoal.update');
    });
});

require __DIR__ . '/auth.php';
