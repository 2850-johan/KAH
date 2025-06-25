 <?php

/*use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrestationController;

// This file is part of the Laravel framework.
// It defines the web routes for the application, including the home page,
// dashboard, and profile management routes. It also includes the Google authentication routes.
Route::get('/', function () {
    return view('accueil');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Dashboard pour les admins
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

// Dashboard pour les intervenants
Route::middleware(['auth', 'role:intervenant'])->group(function () {
    Route::get('/intervenant/dashboard', function () {
        return view('intervenant.dashboard');
    })->name('intervenant.dashboard');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Route to redirect to Google's OAuth page
Route::get('/auth/google/redirect', [GoogleAuthController::class, 'redirect'])->name('auth.google.redirect');

// Route to handle the callback from Google
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])->name('auth.google.callback');

// Route pour la gestion des prestations
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('prestations', PrestationController::class);
});

*/



use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PrestationController;
use App\Http\Controllers\IntervenantController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('accueil'); // vue personnalisée d’accueil
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Dashboard pour les admins
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

// Dashboard pour les intervenants
Route::middleware('auth')->group(function () {
    Route::get('/intervenant/dashboard', function () {
        return view('intervenant.dashboard');
    })->name('intervenant.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/auth/google/redirect', [GoogleAuthController::class, 'redirect'])->name('auth.google.redirect');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])->name('auth.google.callback');

// CRUD Prestation - réservé aux admins (vérifié dans le contrôleur)
Route::middleware(['auth'])->resource('prestations', PrestationController::class);
// Route pour la création de la liste des intervenants
Route::get('/admin/intervenants', [IntervenantController::class, 'index'])->name('intervenants.index');
// Route pour la création d’un intervenant
//action sur des interevenants
Route::get('/admin/intervenants', [IntervenantController::class, 'index'])->name('intervenants.index');
Route::get('/admin/intervenants/{user}/edit', [IntervenantController::class, 'edit'])->name('intervenants.edit');
Route::put('/admin/intervenants/{user}', [IntervenantController::class, 'update'])->name('intervenants.update');
Route::delete('/admin/intervenants/{user}', [IntervenantController::class, 'destroy'])->name('intervenants.destroy');


