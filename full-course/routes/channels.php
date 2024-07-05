<?php

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

// Broadcast::channel('users.{id}', function (User $user, $id) {
//     return (int) $user->id === (int) $id;
// });

// Broadcast::channel('orders.{orderID}', function (User $user, $orderID) {
//     if($user->id !== Order::findOrNew($orderID)->user_id){
//         return false;
//     }
//     return true;
// });

// Broadcast::channel('room.{roomID}', function (User $user, $roomID) {
//     // return $user->only('id', 'name');
    
//     return [
//         'id' => $user->id,
//         'name' => $user->name,
//     ];
// });

// Broadcast::channel('char.room.{roomID}', function (User $user, $roomID) {
//     if(!$user->canAccessRoom($roomID)){
//         return false;
//     }
//     return true;
// });


// Broadcast::channel('chat', function(){
//     // 
// });

Broadcast::channel('app', function(User $user){
    return true;
});