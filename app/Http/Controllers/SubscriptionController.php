<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request, User $channel)
    {
        $subscriber = Auth::user();

        // Check if the user is already subscribed
        if (!$subscriber->subscriptions()->where('channel_id', $channel->id)->exists()) {
            // Create a new subscription
            $subscription = new Subscription();
            $subscription->subscriber_id = $subscriber->id;
            $subscription->channel_id = $channel->id;
            $subscription->save();
        }

        // Redirect or return a response
    }

    public function unsubscribe(Request $request, User $channel)
    {
        $subscriber = Auth::user();

        // Find and delete the subscription
        $subscription = $subscriber->subscriptions()
            ->where('channel_id', $channel->id)
            ->first();

        if ($subscription) {
            $subscription->delete();
        }

        // Redirect or return a response
    }
}
