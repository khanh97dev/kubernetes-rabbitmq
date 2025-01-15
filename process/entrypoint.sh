#!/bin/sh
apk update
apk add php ffmpeg composer
# extension
apk add php-sockets

php /app/process/index.php
