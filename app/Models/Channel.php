<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Channel extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Generate a unique username for the channel.
     *
     * @param string $name
     * @return string
     */
    public static function generateUniqueUsername($name)
    {
        $baseUsername = Str::slug($name);
        $username = $baseUsername;
        $counter = 1;

        // Check if the username is already taken, if so, append a counter to make it unique
        while (static::where('username', $username)->exists()) {
            $username = $baseUsername . '-' . $counter;
            $counter++;
        }

        return $username;
    }

    public function subscribers()
    {
        return $this->belongsToMany(User::class, 'subscriptions', 'channel_id', 'user_id');
    }
}
