<?php

return CMap::mergeArray(

	require_once(dirname(__FILE__).'/main.php'),
	
	array(
		
		
		// ����������� ����������
		//'defaultController' => 'BuhgalterController',
		
		// ����������
		'components'=>array(
			
			// ������������
			'user'=>array(
				'loginUrl'=>array('/users/login'),
			),

  		// mailer
  		'mailer'=>array(
    		'pathViews' => 'application.views.backend.email',
    		'pathLayouts' => 'application.views.email.backend.layouts'
  		),

		),
	)
);
