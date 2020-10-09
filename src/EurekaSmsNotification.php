<?php

namespace Eureka\SMS;

use Exception;
use GuzzleHttp\Client;

class EurekaSmsNotification
{

    private $client ;

    public function __construct(Client $client){
        $this->client = $client;
    }

   public function sendMessage(string $phone , string $content) 
   {
      try{
        $response =  $this->client->post(config('eureka-sms.url'), [

            'headers' =>  ['Authorization'      => 'Bearer '.config('eureka-sms.token'),
                            'Content-Type'  => 'application/json',
                        ],
            'body'    => [
                'phone'      => $phone,
                'content'    => $content
                ]    
           ]);

           if($response->getStatusCode() == 200) return true;
           else return false;
      }catch(Exception $e ){
          return false;
      }
   }
}
