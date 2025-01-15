#!/bin/sh
apk update
apk add php composer bash
# extension
apk add php-sockets

php -S "0.0.0.0:8000" /app/web/router.php
