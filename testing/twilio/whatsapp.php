<?php

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md
require '../../vendor/autoload.php';


use Twilio\Rest\Client;

// Find your Account SID and Auth Token at twilio.com/console
// and set the environment variables. See http://twil.io/secure
$sid = "AC2fc756128a63c34f30e7bdc9b8bc7a75";
$token = "02878a1be9006edbae22bdec519fdb2a";
$twilio = new Client($sid, $token);
$message = $twilio->messages
                  ->create("whatsapp:+918610632556", // to
                           [
                               "from" => "whatsapp:+17542276546",
                               "body" => [
                                  'template' => 'MG587b59a71ac9a78314cb3dbd43b7ec6c',
                                  'data' => [
                                    '1' => 'nithin', // Replace with actual variable data
                                    '2' => 'nithin', // Replace with actual variable data
                                    '3' => 'nithin', // Replace with actual variable data
                                    '4' => 'nithin', // Replace with actual variable data
                                  ],
                               ] 
                           ]
                  );

echo "<pre>"; print($message);die;


/*

<?php
    // Update the path below to your autoload.php,
    // see https://getcomposer.org/doc/01-basic-usage.md
    require_once '/path/to/vendor/autoload.php';
    use Twilio\Rest\Client;

    $sid    = "AC2fc756128a63c34f30e7bdc9b8bc7a75";
    $token  = "[AuthToken]";
    $twilio = new Client($sid, $token);

    $message = $twilio->messages
      ->create("whatsapp:+918610632556", // to
        array(
          "from" => "whatsapp:+14155238886",
          "body" => Your appointment is coming up on July 21 at 3PM
        )
      );

print($message->sid);


<?php
    // Update the path below to your autoload.php,
    // see https://getcomposer.org/doc/01-basic-usage.md
    require_once '/path/to/vendor/autoload.php';
    use Twilio\Rest\Client;

    $sid    = "AC2fc756128a63c34f30e7bdc9b8bc7a75";
    $token  = "[AuthToken]";
    $twilio = new Client($sid, $token);

    $message = $twilio->messages
      ->create("whatsapp:+918610632556", // to
        array(
          "from" => "whatsapp:+14155238886",
          "body" => "Your Message"
        )
      );

print($message->sid);

*/