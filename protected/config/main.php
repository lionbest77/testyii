<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Магазин',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'ext.easyimage.EasyImage',
	),
	'theme'=>'bootstrap',

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'temp123',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths'=>array(
                'bootstrap.gii',
            ),
		),
		
	),
    'behaviors'=>array(
        'runEnd'=>array(
        'class'=>'application.behaviors.WebApplicationEndBehavior',
        ),
    ),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
        ),
		'format'=>array(
			'class'=>'application.components.Formatter',
		),
		'easyImage' => array(
			'class' => 'application.extensions.easyimage.EasyImage',
			//'driver' => 'GD',
			'quality' => 75,
			'cachePath' => '/assets/easyimage/',
			//'cacheTime' => 2592000,
			//'retinaSupport' => false,
			//'isProgressiveJpeg' => false,
		  ),
        'FlexPictureSlider' => array(
			'class' => 'application.extensions.FlexPictureSlider.FlexPictureSlider',
			//'driver' => 'GD',
			//'cacheTime' => 2592000,
			//'retinaSupport' => false,
			//'isProgressiveJpeg' => false,
		  ),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		 * 
		 */
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=yii2advanced',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
			'enableParamLogging' => true,
			'enableProfiling' => true,
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		//'log'=>array(
        //'class'=>'CLogRouter',
        //'routes'=>array(
            //array(
                //'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
                //'ipFilters'=>array('127.0.0.1','192.168.1.215'),
            //),
        //),
    //),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'',
	),
);