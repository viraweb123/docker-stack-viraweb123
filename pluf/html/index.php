<?php
require __DIR__ . '/../vendor/autoload.php';
require 'Pluf.php';

use Pluf\Module;

Pluf::start('config.php');
$url = new Pluf_HTTP_URL();
Pluf_Dispatcher::dispatch($url->getAction(), Module::loadControllers());

