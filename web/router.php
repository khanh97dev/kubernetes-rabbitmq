<?php

// Get current URL path
$path = $_SERVER['REQUEST_URI'];

// Remove query string
$path = explode('?', $path)[0];

$file = __DIR__ . '/' . $path;

if (is_file($file)) {
    require_once $file;
} else {
    return false;
}
