<?php
require_once(VENDOR_PATH . '/autoload.php');

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

function logger($message, $modo = 'info') {
    $logger = new Logger('logs innout');
    $logger->pushHandler(new StreamHandler(PATH . '/extras/logs.txt'));

    switch ($modo) {
        case 'info':
            $logger->info($message);
            break;
        
        case 'warnning':
            $logger->warnning($message);
            break;
        
        case 'error':
            $logger->error($message);
            break;
        
        case 'alert':
            $logger->alert($message);
            break;
        
        case 'notice':
            $logger->notice($message);
            break;
        
        case 'debug':
            $logger->debug($message);
            break;
        
        case 'critical':
            $logger->critical($message);
            break;
        
        case 'emergency':
            $logger->emergency($message);
            break;
        
        default:
            $logger->info($message);
            break;
    }
}