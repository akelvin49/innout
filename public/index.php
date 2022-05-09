<?php
require_once (dirname(__FILE__, 2) . '/src/config/config.php');

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

if (($uri === INDEX_URL_GET_) || ($uri === INDEX_URL_GET_ . 'index.php')) {
    $uri = "/day_records.php";
    
} elseif ($uri !== '/' || $uri !== '' ) {
    $uri = explode(INDEX_URL_GET, $uri);
    $uri = $uri[1];
}


require_once (CONTROLLER_PATH . $uri);