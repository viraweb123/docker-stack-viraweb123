<?php

use Pluf\Module;

require __DIR__ . '/../vendor/autoload.php';
require 'Pluf.php';
Pluf::start('config.php');
//Pluf_Dispatcher::dispatch(Pluf_HTTP_URL::getAction(), 'urls.php');
Pluf_Dispatcher::dispatch(Pluf_HTTP_URL::getAction(), Module::loadControllers());

