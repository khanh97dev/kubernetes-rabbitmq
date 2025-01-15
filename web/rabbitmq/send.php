<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

function send(string $data) {
    $connection = new AMQPStreamConnection(RABBIT_HOST, RABBIT_PORT, RABBIT_USER, RABBIT_PASSWORD);
    $channel = $connection->channel();
    $channel->queue_declare(RABBIT_QUEUE, false, false, false, false);

    $msg = new AMQPMessage($data);
    $channel->basic_publish($msg, '', RABBIT_QUEUE);

    $channel->close();
    $connection->close();
};
