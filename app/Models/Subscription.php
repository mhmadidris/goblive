<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    // Subscriber relationship
    public function subscriber()
    {
        return $this->belongsTo(User::class, 'subscriber_id');
    }

    // Channel relationship
    public function channel()
    {
        return $this->belongsTo(User::class, 'channel_id');
    }
}
