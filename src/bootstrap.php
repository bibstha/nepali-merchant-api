<?php

if (!defined('NMA_ROOT')) {
    define('NMA_ROOT', dirname(__FILE__));
}

if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}


set_include_path(NMA_ROOT . PATH_SEPARATOR . realpath(dirname(__FILE__) . "/../lib") . PATH_SEPARATOR .
    get_include_path());

require_once(NMA_ROOT . DS . 'config.php');