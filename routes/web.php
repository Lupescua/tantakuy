<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\CompetitionVoteController;
use App\Http\Controllers\CompetitionLinkController;

// Public Route
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Authenticated Routes
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // User Management (Full CRUD)
    Route::resource('users', UserController::class);

    // Company Management (Full CRUD)
    Route::resource('companies', CompanyController::class);

    // Competition Management (Full CRUD)
    Route::resource('competitions', CompetitionController::class);

    // Voting for Competitions
    Route::post('/competition-votes', [CompetitionVoteController::class, 'store'])->name('competition.votes.store');
    Route::delete('/competition-votes/{competitionVote}', [CompetitionVoteController::class, 'destroy'])->name('competition.votes.destroy');

    // Links for Competitions
    Route::post('/competition-links', [CompetitionLinkController::class, 'store'])->name('competition.links.store');
    Route::delete('/competition-links/{competitionLink}', [CompetitionLinkController::class, 'destroy'])->name('competition.links.destroy');
});

// Jetstream Authentication Middleware
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
