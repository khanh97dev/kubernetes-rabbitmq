<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/rabbitmq/send.php';

$time = time();
mkdir(STORAGE . "/$time");
$filename = "$time/" . basename($_FILES["file"]["name"]);

if (isset($_POST["submit"])) {
    $check = move_uploaded_file($_FILES["file"]["tmp_name"], STORAGE . "/$filename");
    if ($check !== false) {
        send(
            json_encode([
                'filename' => $filename,
                'resolution' => LOW,
            ])
        );
        send(
            json_encode([
                'filename' => $filename,
                'resolution' => MEDIUM,
            ])
        );
        send(
            json_encode([
                'filename' => $filename,
                'resolution' => HIGH,
            ])
        );

        header('HTTP/1.1 200 OK');
        header('Content-Type: application/json');
        header('Accept: application/json');
        die(json_encode([
            'filename' => $filename,
            'status' => true
        ]));
    } else {
        header('HTTP/1.1 500 Internal Server Error');
        header('Content-Type: application/json');
        header('Accept: application/json');
        die(json_encode([
            'status' => false
        ]));
    }
}
