<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Token {
    private $secretKey = 'ptBuHcBZ5CCLji73q0MygvHvKAO9Lq4I';

    function create(array $payload) : string {
        $token = JWT::encode($payload, $this->secretKey, 'HS256');

        return $token; 
    }

    function payload($token) : array {
        $decodedToken = JWT::decode($token, new Key($this->secretKey, 'HS256'));

        return (array)$decodedToken;
    }
}