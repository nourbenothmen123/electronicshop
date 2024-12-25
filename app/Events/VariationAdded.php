<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use App\Models\Variation;

class VariationAdded
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $variation;

    public function __construct(Variation $variation)
    {
        $this->variation = $variation;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
