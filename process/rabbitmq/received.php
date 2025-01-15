<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../ffmpeg/index.php';
require_once __DIR__ . '/send.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;

$connection = new AMQPStreamConnection(RABBIT_HOST, RABBIT_PORT, RABBIT_USER, RABBIT_PASSWORD);
$queue = RABBIT_QUEUE;
$channel = $connection->channel();
$channel->queue_declare($queue, false, false, false, false);

echo " [*] Waiting for messages from '$queue'. To exit press CTRL+C\n";

// Here process with ffmpeg
$callback = function ($msg) use ($channel) {
    echo "[RECEIVED] $msg->body\n";
    $data = json_decode($msg->body, true);
    $converted = ffmpeg($data);
    if ($converted) {
        $channel->basic_ack($msg->delivery_info['delivery_tag']);
    } else {
        $channel->basic_nack($msg->delivery_info['delivery_tag']);
    }
};

$channel->basic_consume(
    queue: RABBIT_QUEUE,
    consumer_tag: '',
    no_local: false,
    no_ack: false, // $channel->basic_ack($msg->delivery_tag);
    exclusive: false,
    nowait: false,
    callback: $callback
);

try {
    $channel->consume();
} catch (\Throwable $exception) {
    echo $exception->getMessage();
}
