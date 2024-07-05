<?php

use App\Events\Chat\ExampleTwo;
use App\Models\User;
use App\Models\Message;
use App\Events\ExampleEvent;
use App\Events\OrderDelivered;
use App\Events\OrderDispatched;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Models\Order;
use App\Models\Room;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/orders/{order}', function (Order $order) {
    return view('order', [
        'order' => $order
    ]);
});

Route::get('/room/{room}', function (Room $room) {
    return view('room', [
        'room' => $room
    ]);
})->middleware(['auth', 'verified'])->name('room');

Route::get('/broadcast', function () {
    // event(new ExampleEvent());
    // broadcast(new ExampleEvent(User::find(1), Message::find(1)));
    // broadcast(new ExampleTwo());


    // sleep(3);
    // broadcast(new OrderDispatched(User::find(1), Order::find(1)));
    // sleep(5);
    // broadcast(new OrderDelivered(User::find(1), Order::find(1)));

    sleep(3);
    broadcast(new OrderDispatched(Order::find(1)));
    sleep(5);
    broadcast(new OrderDelivered(Order::find(1)));

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/whispers', function () {
    return view('whispers');
})->middleware(['auth', 'verified'])->name('whispers');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
