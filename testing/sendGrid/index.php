<?php
require '../../vendor/autoload.php'; // If you're using Composer (recommended)
// Comment out the above line if not using Composer
// require("<PATH TO>/sendgrid-php.php");
// If not using Composer, uncomment the above line and
// download sendgrid-php.zip from the latest release here,
// replacing <PATH TO> with the path to the sendgrid-php.php file,
// which is included in the download:
// https://github.com/sendgrid/sendgrid-php/releases

$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("sureshbrilliancetcr@gmail.com");
$email->setSubject("Sending with SendGrid is Fun");
$email->addTo("nithinmp.us@gmail.com");

// $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
// $email->addContent(
//     "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
// );

$email->setTemplateId('d-6af340558c074447a147088ca0b1ed11');
$email->addDynamicTemplateData("name", "nithin");
$email->addDynamicTemplateData("score", "4");
$email->addDynamicTemplateData("loginLink", "https://brilliance.college/");
$email->addDynamicTemplateData("Sender_Name", "brilliance");

$email->addDynamicTemplateData("question1", "first question");
$email->addDynamicTemplateData("option11", "first Option");
$email->addDynamicTemplateData("option12", "second Option");
$email->addDynamicTemplateData("option13", "third Option");
$email->addDynamicTemplateData("option14", "fourth Option");
$email->addDynamicTemplateData("answer1", "fourth Option");
$email->addDynamicTemplateData("remark1", "Your answer is correct");

$email->addDynamicTemplateData("question2", "Second question");
$email->addDynamicTemplateData("option21", "first Option");
$email->addDynamicTemplateData("option22", "second Option");
$email->addDynamicTemplateData("option23", "third Option");
$email->addDynamicTemplateData("option24", "fourth Option");
$email->addDynamicTemplateData("answer2", "fourth Option");
$email->addDynamicTemplateData("remark2", "Your answer is wrong you choose second Option");

$email->addDynamicTemplateData("question3", "third question");
$email->addDynamicTemplateData("option31", "first Option");
$email->addDynamicTemplateData("option32", "second Option");
$email->addDynamicTemplateData("option33", "third Option");
$email->addDynamicTemplateData("option34", "fourth Option");
$email->addDynamicTemplateData("answer3", "fourth Option");
$email->addDynamicTemplateData("remark3", "Your answer is correct");

$email->addDynamicTemplateData("question4", "fourth question");
$email->addDynamicTemplateData("option41", "first Option");
$email->addDynamicTemplateData("option42", "second Option");
$email->addDynamicTemplateData("option43", "third Option");
$email->addDynamicTemplateData("option44", "fourth Option");
$email->addDynamicTemplateData("answer4", "fourth Option");
$email->addDynamicTemplateData("remark4", "Your answer is correct");

$email->addDynamicTemplateData("question5", "fifth question");
$email->addDynamicTemplateData("option51", "first Option");
$email->addDynamicTemplateData("option52", "second Option");
$email->addDynamicTemplateData("option53", "third Option");
$email->addDynamicTemplateData("option54", "fourth Option");
$email->addDynamicTemplateData("answer5", "fourth Option");
$email->addDynamicTemplateData("remark5", "Your answer is correct");

$sendgrid = new \SendGrid('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');
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}

