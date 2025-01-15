<?php
define('RABBIT_HOST', getenv('RABBITMQ_SERVICE_HOST'));
define('RABBIT_PORT', 30567); // Removed quotes, as port should be an integer
define('RABBIT_USER', 'rabbit');
define('RABBIT_PASSWORD', 'rabbit');
define('RABBIT_QUEUE', 'demo1');

define('RESOLUTION', [
    'LOW_WIDTH' => 420,
    'LOW_HEIGHT' => 320,
    'MEDIUM_WIDTH' => 640,
    'MEDIUM_HEIGHT' => 480,
    'HIGH_WIDTH' => 1280,
    'HIGH_HEIGHT' => 720,
]);
define('STORAGE', __DIR__ . '/../storage');
