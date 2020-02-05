<?php

namespace iAxel\Sender;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class Sender
{
    /**
     * @var string
     */
    protected $url = 'http://91.204.239.44';

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var string
     */
    protected $originator;

    /**
     * @param array $config
     *
     * @return void
     */
    public function __construct(array $config = [])
    {
        $this->client = new Client([
            'base_uri' => $this->url,

            'auth' => [
                $config['username'],
                $config['password'],
            ],
        ]);

        $this->originator = $config['originator'];
    }

    /**
     * @param string $phone
     * @param string $text
     *
     * @return bool
     */
     public function sms(string $phone, string $text): bool
     {
         try {
             $this->client->post('broker-api/send', [
                 'json' => [
                     'messages' => [
                         'recipient' => $phone,

                         'message-id' => time(),

                         'sms' => [
                             'originator' => $this->originator,

                             'content' => [
                                 'text' => $text,
                             ],
                         ],
                     ],
                 ],
             ]);
         } catch (ClientException $exception) {
             return false;
         }

         return true;
     }
}
