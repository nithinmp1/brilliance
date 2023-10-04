<?php

require '../../vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

// Your secret key (keep this secret)
$secretKey = 'ptBuHcBZ5CCLji73q0MygvHvKAO9Lq4I';

// Create a token payload
$tokenPayload = [
    "login_as" => "staff",
    "login_id" => 23,
    "username" => "nithin mps",
    "time" => 1696354096,
    "ip" => "111.92.126.242",
    "device" => "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36",
    "accessID" => 1,
    "exp" => time() + 3600, // Token expiration time (1 hour)
];

// Encode the payload into a JWT
$token = JWT::encode($tokenPayload, $secretKey, 'HS256');

// Output the JWT


// require '../../vendor/autoload.php';
// use Firebase\JWT\JWT;
// use Firebase\JWT\Key;
$secretKey = 'ptBuHcBZ5CCLji73q0MygvHvKAO9Lq4I';

try {
    // Decode and verify the token
    // $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjoxMjMsInVzZXJuYW1lIjoiam9obl9kb2UiLCJleHAiOjE2OTUzMjM4NjR9.iqzhqmhrWXy4tVgmQ8j_aSvFBrLht1Rwem54Y02uBuQ';
    $decodedToken = JWT::decode($token, new Key($secretKey, 'HS256'));
    // $decodedToken = JWT::decode($token, $secretKey, 'HS256');
    // var_dump( $decodedToken);die;    

    // Access token claims
    $userId = $decodedToken->login_as;
    $username = $decodedToken->login_id;

    // Your code here to process the claims
    echo "User ID: $userId<br>";
    echo "Username: $username<br>";
} catch (Exception $e) {
    echo 'Invalid token: ' . $e->getMessage();
}
?>
