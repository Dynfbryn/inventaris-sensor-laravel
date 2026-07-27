<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeknisiController;
use App\Http\Controllers\PimpinanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\KategoriSensorController;
use App\Http\Controllers\LokasiController;

/*
|--------------------------------------------------------------------------
| Authentication Routes (Laravel Breeze)
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

/*
|--------------------------------------------------------------------------
| Profile Routes (Laravel Breeze)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        
        // Tambahkan routes CRUD Sensor di sini
        Route::resource('sensors', SensorController::class);
        Route::resource('users', UserController::class);
        Route::resource('inventaris', InventarisController::class);
        Route::get('/reports', [MaintenanceController::class, 'index'])->name('reports.index');

        // Kategori & Lokasi sensor - supaya admin bisa menambah sendiri
        // tanpa perlu ubah kode setiap ada jenis sensor MKGI baru.
        Route::resource('kategori-sensor', KategoriSensorController::class)
            ->only(['index', 'store', 'update', 'destroy']);
        Route::resource('lokasi', LokasiController::class)
            ->only(['index', 'store', 'update', 'destroy']);
    });
/*
|--------------------------------------------------------------------------
| Teknisi Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:teknisi'])
    ->prefix('teknisi')
    ->name('teknisi.')
    ->group(function () {
        Route::get('/dashboard', [TeknisiController::class, 'index'])->name('dashboard');
        Route::get('/maintenance', [MaintenanceController::class, 'create'])->name('maintenance.create');
        Route::post('/maintenance', [MaintenanceController::class, 'store'])->name('maintenance.store');
        Route::get('/laporan', [MaintenanceController::class, 'index'])->name('laporan.index');
        
        // Teknisi hanya bisa lihat daftar sensor
        Route::get('/sensors', [SensorController::class, 'index'])->name('sensors.index');

        // Teknisi bisa menandai sensor rusak/maintenance menjadi aktif lagi
        Route::patch('/sensors/{id}/status', [TeknisiController::class, 'updateStatus'])
            ->name('sensors.updateStatus');
    });
/*
|--------------------------------------------------------------------------
| Pimpinan Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:pimpinan'])->prefix('pimpinan')->group(function () {
    Route::get('/dashboard', [PimpinanController::class, 'index'])->name('pimpinan.dashboard');
});

/*
|--------------------------------------------------------------------------
| Dashboard Redirect Based on Role
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    $user = auth()->user();
    
    switch ($user->role) {
        case 'admin':
            return redirect('/admin/dashboard');
        case 'teknisi':
            return redirect('/teknisi/dashboard');
        case 'pimpinan':
            return redirect('/pimpinan/dashboard');
        default:
            return view('dashboard');
    }
})->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Home Route
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect('/login');
});