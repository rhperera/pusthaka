<?php

require_once 'base/App.php';
require_once 'base/Controller.php';
require_once 'base/Model.php';
#require_once 'base/english.php';
require_once 'base/sinhala.php';

define('ASSET_PATH',
    'http://'.$_SERVER['HTTP_HOST'].'/'.
    str_replace(
        $_SERVER['DOCUMENT_ROOT'],
        '',
        str_replace('\\','/',dirname(__DIR__).'/www')
        )
);