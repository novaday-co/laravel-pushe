<?php

namespace Tests;

use FarazinCo\LaravelPushe\Pushe;
use FarazinCo\LaravelPushe\PusheServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
class PusheTest extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            PusheServiceProvider::class,
        ];
    }

    public function testBody()
    {
        $pushe = new Pushe;
        $response = $pushe->setFilters([
            'tags' => [
                'user_id' => '123',
            ]
        ])
        ->setData([
            "title" => "This is a filtered notification",
            "content" => "Only users already subscribed to filter can see me",
        ]);

        $this->assertEquals($response->filters['tags']['user_id'],123);
        $this->assertEquals($response->data['title'],"This is a filtered notification");
    }
}