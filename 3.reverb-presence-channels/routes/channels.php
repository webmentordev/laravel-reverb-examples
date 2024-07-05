<?php

use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('room.{roomID}', function (User $user, $roomID) {
    
    return $user->only('id', 'name');
    
    // return [
    //     'id' => $user->id,
    //     'name' => $user->name,
    // ];
});
