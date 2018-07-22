<?php

return CMap::mergeArray(

	require_once(dirname(__FILE__).'/main.php'),
	
	array(
		
		
		// ����������� ����������
		'defaultController' => 'site',
		
		// ����������
		'components'=>array(
			
			// ������������
			'user'=>array(
				'loginUrl'=>array('/site/index'),
			),

  		// mailer
  		'mailer'=>array(
    		'pathViews' => 'application.views.backend.email',
    		'pathLayouts' => 'application.views.email.backend.layouts'
  		),

		),
	)
);
