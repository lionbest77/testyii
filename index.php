<?php
// ���� �� ���������� � ������� ��� �������
$yii = dirname(__FILE__).'/yii/framework/yii.php';
$config = dirname(__FILE__).'/protected/config/frontend.php';
 
// �������� �����?
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);

//echo phpinfo();
//die(); 

// ���������� ���������
require_once($yii);
// �������� ���������� � ������� ������ WebApplicaitonEndBehavior, ������ ���, ��� ����� ��������� ��������
Yii::createWebApplication($config)->runEnd('frontend');

?>