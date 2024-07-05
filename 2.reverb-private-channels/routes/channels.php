<?php

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('users.{id}', function (User $user, $id) {
    return (int) $user->id === (int) $id;
});

// Broadcast::channel('chat.room.{roomID}', function (User $user, $roomID) {
//     if(!$user->canAccessRoom($roomID)){
//         return false;
//     }
//     return true;
// });

Broadcast::channel('orders.{orderID}', function (User $user, $orderID) {

    if($user->id !== Order::findOrNew($orderID)->user_id){
        return false;
    }
    return true;
});