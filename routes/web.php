<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\RecoveryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\TransactionController;

// Home Route
Route::get('/', [WelcomeController::class,'index'])->name('home');

// User Routes
Route::get('/login', [UserController::class,'show_login'])->name('login.show');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
// Password Recovery
Route::get('/recovery', [RecoveryController::class, 'index'])->name('recovery.index');
Route::post('/recovery', [RecoveryController::class, 'verify'])->name('recovery.verify');
Route::put('/recovery', [RecoveryController::class, 'update'])->name('recovery.update');
/* Route::get('/register', [UserController::class, 'show_register'])->name('register.show');
Route::post('/register', [UserController::class, 'register'])->name('register'); */

// Authenticated Routes
Route::middleware(['auth', 'user.activity'])->group(function(){
    // Inventory Routes
    Route::get('inventory',[InventoryController::class, 'index'])->name('inventory.index');
    Route::post('inventory',[InventoryController::class, 'store'])->name('inventory.store');
    Route::get('inventory/create',[InventoryController::class, 'create'])->name('inventory.create');
    Route::get('inventory/{item}/edit',[InventoryController::class, 'edit'])->name('inventory.edit');
    Route::put('inventory/{item}',[InventoryController::class, 'update'])->name('inventory.update');
    Route::delete('inventory/{item}',[InventoryController::class, 'delete'])->name('inventory.destroy');
    Route::post('inventory/{item}/replenish',[InventoryController::class, 'replenish'])->name('inventory.replenish');
    Route::post('inventory/{item}/deplete',[InventoryController::class, 'deplete'])->name('inventory.deplete');
    Route::get('inventory/{item}/view',[InventoryController::class, 'show'])->name('inventory.show');

    // Dashboard Routes
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard.index');

    // User Routes
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::put('/profile',[UserController::class, 'updateProfile'])->name('profile.update');

    // Menu Routes
    Route::get('/menus', [MenuController::class,'index'])->name('menus.index');
    Route::post('/menus',[MenuController::class, 'store'])->name('menus.store');
    Route::get('/menus/create', [MenuController::class,'create'])->name('menus.create');
    Route::get('/menus/{menu}', [MenuController::class, 'show'])->name('menus.show');
    Route::get('/menus/{menu}/edit', [MenuController::class, 'edit'])->name('menus.edit');
    Route::put('/menus/{menu}', [MenuController::class, 'update'])->name('menus.update');
    Route::delete('/menus/{menu}', [MenuController::class, 'destroy'])->name('menus.destroy');

    // Management Routes
    Route::get('users', [ManagementController::class, 'index'])->name('management.users.index');
    Route::get('users/create', [ManagementController::class, 'create'])->name('management.users.create');
    Route::post('users', [ManagementController::class, 'store'])->name('management.users.store');
    Route::get('users/{user}', [ManagementController::class, 'show'])->name('management.users.show');
    Route::get('users/{user}/edit', [ManagementController::class, 'edit'])->name('management.users.edit');
    Route::put('users/{user}', [ManagementController::class, 'update'])->name('management.users.update');
    Route::delete('users/{user}', [ManagementController::class, 'destroy'])->name('management.users.destroy');

    // Event Routes
    Route::get('/events', [EventController::class,'index'])->name('events.index');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
    Route::get('/events/{event}/edit', [EventController::class,'edit'])->name('events.edit');
    Route::put('/events/{event}', [EventController::Class,'update'])->name('events.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');

    // Transactions Routes
    Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
    Route::put('/transactions/{transaction}/cancel', [TransactionController::class, 'cancel'])->name('transactions.cancel');
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');

    // Point of Sales Routes
    Route::get('/pos', [PosController::class, 'index'])->name('pos.index');
    Route::get('/api/check-active-event', [PosController::class, 'checkActiveEvent']);

    // Help and References Routes
    Route::get('/help', [HelpController::class, 'index'])->name('help.index');

    // Contact Routes
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');
});
