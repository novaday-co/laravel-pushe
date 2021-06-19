<?php

namespace Tests;

use FarazinCo\LaravelPushe\Pushe;
use PHPUnit\Framework\TestCase;

class PusheTest extends TestCase
{
    public function testSimple()
    {
        $pushe = new Pushe;
        dd($pushe->setToken('17c8217d375e7fddcb6350e327d57300fa726bc5')
        ->setAppIds('8ep6lj84yk5103xd')
        ->setFilters([
            'tags' => [
                'user_id' => '123',
                'environment' => 'development',
                'server' => 'farazin',
                'database' => 'dsp_3_1',
            ]
        ])
        ->setData([
            "title" => "This is a topic notification",
            "content" => "Only users already subscribed to topic can see me",
        ])
        ->send());
 
        // $this->assertEquals('https://fa.wikipedia.org/wiki/مدیاویکی:Gadget-Extra-Editbuttons-botworks.js', PersianTools::URLfix('https://fa.wikipedia.org/wiki/%D9%85%D8%AF%DB%8C%D8%A7%D9%88%DB%8C%DA%A9%DB%8C:Gadget-Extra-Editbuttons-botworks.js'));
    }
}