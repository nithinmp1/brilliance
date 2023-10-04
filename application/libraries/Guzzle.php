<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Guzzle {
    private $client;
    private $url;
    private $logger;

    function __construct() {
        $this->client = new Client();
        $this->logger = new Logger('my_logger');
        $this->logger->pushHandler(new StreamHandler('logfile.log', Logger::INFO));
    }

    function get(array $data) : array {
        $this->setUrl($data['method']);
        try {
            $this->logger->info('API Access started', $data);
            if (isset($data['postData']) && !empty($data['postData'])) {
                $response = $this->client->request('POST', $this->url, [
                    'json' => $data['postData'],
                    // You can add other options like headers, authentication, etc. here
                ]);
            } else {            
                $response = $this->client->get($this->url);
            }
            $body = $response->getBody()->getContents();
            $data = json_decode($body, true);
            $this->logger->info('API Access completed', $data);

            return $data; 
        } catch (GuzzleHttp\Exception\RequestException $e) {
            var_dump($e);
            $data['getMessage'] = $e->getMessage();
            $this->logger->error('An error occurred.', $data);
        }
    }

    function setUrl($method) {
        $this->url = API_URL.API_VERSION.'/'.$method;
    }

}