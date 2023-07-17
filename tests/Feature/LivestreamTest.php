<?php

namespace Tests\Feature;

use Tests\TestCase;
use Mockery;
use Google_Client;
use Google_Service_YouTube;

class LivestreamTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    /**
     * Test the getLivestreams method.
     *
     * @return void
     */
    public function testGetLivestreams()
    {
        $clientMock = Mockery::mock(Google_Client::class);

        $youtubeMock = Mockery::mock(Google_Service_YouTube::class);

        $this->app->instance(Google_Client::class, $clientMock);
        $this->app->instance(Google_Service_YouTube::class, $youtubeMock);

        $response = $this->get('/livestream');

        $response->assertStatus(200);
        $response->assertViewIs('pages.front.livestream');
        $response->assertViewHas(['livestreams', 'channelAvatars', 'subscribersCount']);
    }
}
