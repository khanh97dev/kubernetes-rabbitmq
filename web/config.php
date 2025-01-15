<?php
define('RABBIT_HOST', getenv('RABBITMQ_SERVICE_HOST'));
define('RABBIT_PORT', 30567);
define('RABBIT_USER', 'rabbit');
define('RABBIT_PASSWORD', 'rabbit');
define('RABBIT_QUEUE', 'demo1');

define('STORAGE', __DIR__ . '/../storage');
define('HIGH', 'HIGH');
define('MEDIUM', 'MEDIUM');
define('LOW', 'LOW');
