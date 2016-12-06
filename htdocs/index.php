<?php

require_once(__DIR__ . '/../vendor/autoload.php');

$config = require(__DIR__ . '/../config/config.php');
$front = new \emilymaitan\PAE_EM4\Core\FrontController($config);
$front->process();
