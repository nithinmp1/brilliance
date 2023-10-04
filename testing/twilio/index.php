<?php
require '../../vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

// $accountSid = 'AC60ffa6c5087ff373423082417f61db27';
// $accountSid = 'MG587b59a71ac9a78314cb3dbd43b7ec6c';
// $authToken = '03bedb13c85adc3397fa53ccd1373f61';

$accountSid = 'AC2fc756128a63c34f30e7bdc9b8bc7a75';
$authToken = '02878a1be9006edbae22bdec519fdb2a';

// Create a Twilio client
$twilio = new Twilio\Rest\Client($accountSid, $authToken);

// Send an SMS message
$message = $twilio->messages->create(
    '+918610632556', // Recipient's phone number
    [
        'messagingServiceSid' => 'MG587b59a71ac9a78314cb3dbd43b7ec6c', // Your Twilio phone number
        'body' => 'Hello, this is a test message from your CRM!',
    ]
);

// Check for success
echo "<pre>";print_r($message);die;
if ($message->sid) {
    echo 'SMS sent successfully.';
} else {
    echo 'Failed to send SMS.';
}
?>
