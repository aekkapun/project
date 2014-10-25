<?php

// Перевірка на IP адрес
if (in_array(@$_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1'])) {
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_ENV') or define('YII_ENV', 'dev');
	
	// Конвертор LESS
	//require (__DIR__ . '/../vendor/lessphp/lessc.inc.php');
	//$less = new lessc;
	//$less->checkedCompile( __DIR__ . '/less/bootstrap.less', __DIR__ . '/css/main.css');
}

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/web.php');

(new yii\web\Application($config))->run();