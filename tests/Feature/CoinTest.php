<?php

namespace Tests\Unit;

use App\Http\Controllers\VideoController;
use App\Models\Channel;
use App\Models\Coin;
use App\Models\User;
use App\Models\Video;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Illuminate\Foundation\Testing\TestResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Testing\TestResponse as TestingTestResponse;

class CoinTest extends TestCase
{
    use DatabaseTransactions;

    public function testSendCoin()
    {
        Alert::spy();

        $user = User::factory()->create();
        $this->actingAs($user);

        $fromChannel = Channel::factory()->create(['user_id' => $user->id]);

        $video = Video::factory()->create();

        $requestData = [
            'channelId' => 2,
            'videoId' => $video->id,
            'rangeCoins' => 10,
            'title' => 'Title Text',
            'duration' => '1:20',
            'format' => '.mp4',
            'category' => 'PC',
            'visibility' => 'Public',
            'description' => 'desc',
            'pesan' => 'Sample message',
        ];

        $request = new Request($requestData);
        $request->files->add([
            'video' => UploadedFile::fake()->create('video.mp4', 100),
            'thumbnail' => UploadedFile::fake()->image('thumbnail.jpg'),
        ]);

        Storage::fake('videos');
        Storage::fake('thumbnails');

        $videoController = new VideoController();
        $response = $videoController->store($request);

        $this->assertInstanceOf(RedirectResponse::class, $response);
        // TestingTestResponse::fromBaseResponse($response)->assertRedirect(route('video.show', $video->url));

        // Alert::assertSuccess('Send coin successfully!');

        // $this->assertDatabaseHas('coins', [
        //     'from_channel_id' => $fromChannel->id,
        //     'to_channel_id' => $requestData['channelId'],
        //     'video_id' => $requestData['videoId'],
        //     'user_id' => $user->id,
        //     'coin' => $requestData['rangeCoins'],
        //     'pesan' => $requestData['pesan'],
        // ]);

        // $this->assertDatabaseHas('channels', [
        //     'id' => $fromChannel->id,
        //     'coin' => $fromChannel->coin - $requestData['rangeCoins'],
        // ]);

        // $destinationChannel = Channel::find($requestData['channelId']);
        // $this->assertDatabaseHas('channels', [
        //     'id' => $destinationChannel->id,
        //     'coin' => $destinationChannel->coin + $requestData['rangeCoins'],
        // ]);
    }
}
