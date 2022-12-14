<?php
require('vendor/autoload.php');

use \PhpMqtt\Client\MqttClient;
use \PhpMqtt\Client\ConnectionSettings;

$server   = 'localhost';
$port     = 1883;
$clientId = rand(5, 15);
$clean_session = false;

$connectionSettings  = new ConnectionSettings();
$connectionSettings
  ->setKeepAliveInterval(60)
  ->setLastWillTopic('tes')
  ->setLastWillMessage('client disconnect')
  ->setLastWillQualityOfService(1);


$mqtt = new MqttClient($server, $port, $clientId);

$mqtt->connect($connectionSettings, $clean_session);
printf("client connected\n");

$mqtt->subscribe('tes', function ($topic, $message) {
    printf("Received message on topic [%s]: %s\n", $topic, $message);
}, 0);
$mqtt->loop(true);
?>