<?php

namespace FarazinCo\LaravelPushe;

use BadMethodCallException;
use GuzzleHttp\Client;

class Pushe{

    public $filters = [] , $topics = [] , $data, $token, $retry_wait_milliseconds = 100 , $retry_attempt = 3 , $app_ids = '';

    public function __construct(){
        // $this->token = Config::get('Pushe.token');
        // $this->app_ids = Config::get('Pushe.app_ids');
        // $this->retry_attempt  = Config::get('Pushe.retry_attempt');
        // $this->retry_wait_milliseconds  = Config::get('Pushe.retry_wait_milliseconds');
    }

    public function setToken($token){
        $this->token = $token;
        return $this;
    }

    public function setAppIds($app_ids){
        $this->app_ids = $app_ids;
        return $this;
    }

    public function setRetryAttempt($retry_attempt){
        $this->retry_attempt = $retry_attempt;
        return $this;
    }

    public function setRetryWaitMiliseconds($retry_wait_milliseconds){
        $this->retry_wait_milliseconds = $retry_wait_milliseconds;
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

        $client = new Client([ 'timeout' => 5.0 , 'headers' => $headers , 'body' => json_encode($body) ]);
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