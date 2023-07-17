<?php

namespace Tests\Unit;

use App\Http\Controllers\VideoController;
use App\Models\Channel;
use App\Models\User;
use App\Models\Video;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Tests\TestCase;

class VideoTest extends TestCase
{
    use DatabaseTransactions;

    public function testStore()
    {
        Storage::fake('public');
        Alert::spy();

        $user = User::factory()->create();
        $this->actingAs($user);

        $channel = Channel::factory()->create(['user_id' => $user->id]);

        $videoFile = UploadedFile::fake()->create('video.mp4');
        $thumbnailFile = UploadedFile::fake()->image('thumbnail.jpg');

        $requestData = [
            'title' => 'Test Video',
            'duration' => '5:30',
            'format' => 'MP4',
            'video' => $videoFile,
            'thumbnail' => $thumbnailFile,
            'category' => 'Music',
            'visibility' => 'Public',
            'description' => 'This is a test video.',
        ];

        $response = $this->post(route('mychannel.video.store'), $requestData);

        $response->assertRedirect(route('mychannel.index'));
        // $response->assertSessionHas('toast', function ($toast) {
        //     return $toast['type'] === 'success' && $toast['title'] === 'Add new video successfully!';
        // });

        // $this->assertDatabaseHas('videos', [
        //     'channel_id' => $channel->id,
        //     'title' => 'Test Video',
        //     'duration' => '5:30',
        //     'format' => 'MP4',
        //     'category' => 'Music',
        //     'visibility' => 'Public',
        //     'description' => 'This is a test video.',
        // ]);

        // Storage::disk('public')->assertExists('videos/' . $videoFile->hashName());
        // Storage::disk('public')->assertExists('thumbnails/' . $thumbnailFile->hashName());

        // Alert::assertToastSuccess('Add new video successfully!');
    }
}
