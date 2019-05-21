<?php
use App\Client;

require_once __DIR__.'/vendor/autoload.php';

// This call will return an json response with one root key and some children models
printf("Root element example:\n %s\n\n", Client::run('root'));

// This call will return an json response with no root element an multiple elements in the root level with their children
printf("No Root element example:\n %s", Client::run());
