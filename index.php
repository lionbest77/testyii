<?php
// путь до фреймворка и нужного нам конфига
$yii = dirname(__FILE__).'/yii/framework/yii.php';
$config = dirname(__FILE__).'/protected/config/frontend.php';
 
// включать дебаг?
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);

//echo phpinfo();
//die(); 

// подключаем фреймворк
require_once($yii);
// стартуем приложение с помощью нашего WebApplicaitonEndBehavior, указав ему, что нужно загрузить фронтенд
Yii::createWebApplication($config)->runEnd('frontend');

?>