<?php

namespace FarazinCo\LaravelPushe;

use BadMethodCallException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;

class Pushe{

    public $filters = [] , $topics = [] , $data, $token = null, $app_ids = '';

    public function __construct(){
        $this->token = config('pushe.token',null);
        $this->app_ids = config('pushe.app_ids',null);
        $this->timeout  = config('pushe.timeout',5);
    }

    public function setToken($token){
        $this->token = $token;
        return $this;
    }

    public function setAppIds($app_ids){
        $this->app_ids = $app_ids;
        return $this;
    }

    public function setData($data){
        $this->data = $data;
        return $this;
    }

    public function setFilters($filters){
        $this->filters = $filters;
        return $this;
    }

     public function setTags($tags){
        $this->filters['tags'] = $tags;
        return $this;
    }

    public function setTopics($topics){
        $this->topics = $topics;
        return $this;
    }

    public function send(){

        $body = [
            'data' => $this->data,
            'app_ids' => $this->app_ids,
        ];

        if(count($this->topics) > 0)
            $body['topics'] = $this->topics;

        if(count($this->filters) > 0)
            $body['filters'] = $this->filters;

        $headers = [
            "Content-Type" => "application/json",
            "Accept" => "application/json",
            "Authorization" => "Token " . $this->token,
        ];

        $client = new Client([ 'timeout' => $this->timeout , 'headers' => $headers , 'body' => json_encode($body) ]);
        $response = $client->request('POST', 'https://api.pushe.co/v2/messaging/notifications/');

        return $response;

    }

    public function __call($method, $parameters)
    {
        if (!method_exists($this,$method)) {
            throw new BadMethodCallException(sprintf(
                'Method %s::%s does not exist.', static::class, $method
            ));
        }

        return $this->$method($parameters);
    }
}