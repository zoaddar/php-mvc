<?php
ini_set('display_errors', 1);

define('WEBROOT', str_replace("webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));

require(ROOT . 'system/error.php');
require(ROOT . 'system/env.php');
require(ROOT . 'app/config/core.php');

require(ROOT . 'router.php');
require(ROOT . 'request.php');
require(ROOT . 'dispatcher.php');

$dispatch = new Dispatcher();
$dispatch->dispatch();