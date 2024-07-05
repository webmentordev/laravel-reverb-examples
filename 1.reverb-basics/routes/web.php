<?php

use App\Events\Chat\ExampleTwo;
use App\Models\User;
use App\Events\Example;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Models\Message;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/broadcast', function () {
    broadcast(new Example(User::find(1), Message::find(1)));
    // broadcast(new ExampleTwo());
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
