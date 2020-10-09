<?php

namespace Eureka\SMS\Tests;

use Eureka\SMS\EurekaSmsNotification;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Mockery;
use Orchestra\Testbench\TestCase;

class EurekaNotificationTest extends TestCase
{
    /** @test */
    public function send_message_ok()
    {
        $this->instance(Client::class, Mockery::mock(Client::class , function($mock){
            $response = new Response(200, [], '{}');
            $mock->shouldReceive('post')
                    ->andReturn($response);
        }));

        $eurekaNotification = resolve(EurekaSmsNotification::class);
        $this->assertTrue($eurekaNotification->sendMessage('691131446', 'hello john wick ')) ;
    }

    /** @test */
    public function send_message_failed()
    {
        $this->instance(Client::class, Mockery::mock(Client::class , function($mock){
            $response = new Response(500, [], '{}');
            $mock->shouldReceive('post')
                    ->andReturn($response);
        }));

        $eurekaNotification = resolve(EurekaSmsNotification::class);
        $this->assertFalse($eurekaNotification->sendMessage('691131446', 'hello john wick ')) ;
    }
}