<?php

namespace App\Events\Products;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ProductCreate
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * 
     *
     * @param \App\Models\Product $product
     */

    public $product;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(\App\Models\Product $product)
    {
        $this->product = $product;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
