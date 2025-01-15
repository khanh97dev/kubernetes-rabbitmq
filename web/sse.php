<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
header('Connection: keep-alive');
while (true) {
    echo 'data: '. json_encode([
    ]);
    echo PHP_EOL . PHP_EOL;
    ob_flush();
    flush();
    usleep(500 * 1000); // 100ms
}
