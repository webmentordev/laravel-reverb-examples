<?php

namespace App\Events;

use App\Models\User;
use App\Models\Order;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class OrderDispatched implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    // public function __construct(public User $user, public Order $order)
    // {}
    // public function broadcastOn(): array
    // {
    //     return [
    //         new PrivateChannel('users.' . $this->user->id),
    //         new PrivateChannel('orders.' . $this->order->id),
    //     ];
    // }

    public function __construct(public Order $order)
    {}
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('users.'. $this->order->user_id),
            new PrivateChannel('orders.' . $this->order->id),
        ];
    }
}
