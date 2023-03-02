<?php
require "vendor/autoload.php";
use Minishlink\WebPush\VAPID;
print_r(VAPID::createVapidKeys());