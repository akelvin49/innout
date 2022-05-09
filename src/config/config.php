<?php

date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');

// Constantes gerais
define('DAILY_TIME', 60 * 60 * 8);

// Pastas
define('INDEX_URL_GET_', '/projetos/innout/public/'); // com a barra no final
define('INDEX_URL_GET', '/projetos/innout/public');
define('MODEL_PATH', realpath(dirname(__FILE__) . '/../models'));
define('VIEW_PATH', realpath(dirname(__FILE__) . '/../views'));
define('TEMPLATE_PATH', realpath(dirname(__FILE__) . '/../views/templates'));
define('CONTROLLER_PATH', realpath(dirname(__FILE__) . '/../controllers'));
define('APP_EXCEPTION_PATH', realpath(dirname(__FILE__) . '/../exceptions'));
define('PUBLIC_PATH', realpath(dirname(__FILE__, 3) . '/public'));


//Arquivos
require_once(realpath(dirname(__FILE__) . '/database.php'));
require_once(realpath(dirname(__FILE__) . '/loader.php'));
require_once(realpath(dirname(__FILE__) . '/session.php'));
require_once(realpath(dirname(__FILE__) . '/date_utils.php'));
require_once(realpath(dirname(__FILE__) . '/utils.php'));
require_once (MODEL_PATH . '/model.php');
require_once (MODEL_PATH . '/user.php');
require_once (MODEL_PATH . '/workingHours.php');
require_once (APP_EXCEPTION_PATH . '/appException.php');
require_once (APP_EXCEPTION_PATH . '/validationException.php');

