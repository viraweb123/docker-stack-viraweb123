<?php
require __DIR__ . '/../vendor/autoload.php';
require 'Pluf.php';

use Pluf\Module;

Pluf::start('config.php');
Pluf_Dispatcher::dispatch(Pluf_HTTP_URL::getAction(), Module::loadControllers());

