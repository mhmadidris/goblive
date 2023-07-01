<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channel;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function subscribe(Channel $channel)
    {
        Auth::user()->subscriptions()->attach($channel->id);
        return back()->with('success', 'Subscribed successfully!');
    }

    public function unsubscribe(Channel $channel)
    {
        Auth::user()->subscriptions()->detach($channel->id);
        return back()->with('success', 'Unsubscribed successfully!');
    }
}
