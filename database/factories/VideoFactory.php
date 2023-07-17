<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'channel_id' => '2',
            'title' => 'Title Text',
            'video' => 'video.mp4',
            'url' => 'JkjKHUIKHhjkgh',
            'thumbnail' => 'thumbnail.jpg',
            'duration' => '2:20',
            'format' => '.mp4',
            'category' => 'PC',
            'description' => 'desc',
            // Add other default values for other fields if needed
        ];
    }
}
