<?php
use mvc\Dispatcher;
use mvc\request;
use mvc\router;

require '../vendor/autoload.php'; 


const WEBROOT = '/mvc/';
// define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"])); // WEBROOT = /mvc/
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"])); // ROOT = C:/xampp/htdocs/mvc/

$dispatch = new Dispatcher();
$dispatch->dispatch();

?>