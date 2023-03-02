<?php
// (A) LOAD WEB PUSH LIBRARY
require "vendor/autoload.php";
use Minishlink\WebPush\Subscription;
use Minishlink\WebPush\WebPush;

// (B) GET SUBSCRIPTION
$sub = Subscription::create(json_decode($_POST["sub"], true));

// (C) NEW WEB PUSH OBJECT - CHANGE TO YOUR OWN!
$push = new WebPush(["VAPID" => [
  "subject" => "your@email.com",
  "publicKey" => "YOUR-PUBLIC-KEY",
  "privateKey" => "YOUR-PRIVATE-KEY"
]]);

// (D) SEND TEST PUSH NOTIFICATION
$result = $push->sendOneNotification($sub, json_encode([
  "title" => "Welcome!",
  "body" => "Yes, it works!",
  "icon" => "i-loud.png",
  "image" => "i-cover.png"
]));
$endpoint = $result->getRequest()->getUri()->__toString();

// (E) HANDLE RESULT - OPTIONAL
if ($result->isSuccess()) {
  // echo "Successfully sent {$endpoint}.";
} else {
  // echo "Send failed {$endpoint}: {$result->getReason()}";
  // $result->getRequest();
  // $result->getResponse();
  // $result->isSubscriptionExpired();
}