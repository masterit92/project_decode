<?php
include_once 'const.php';
include_once 'functions.php';

//Goi lop Zend Application
require_once 'Zend/Application.php';
$environment = APPLICATION_ENV;
$options = APPLICATION_PATH . '/configs/application.ini';
$application = new Zend_Application($environment, $options);
$application->bootstrap()->run();
