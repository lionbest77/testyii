<?php
    class BackEndController extends Controller
{

	// ������
	public $layout = 'application';
		
	// ����
	public $menu = array();
	
	// ������
	public $breadcrumbs = array();
	
	
	/*
		�������
	*/
	public function filters()
	{
		return array(
			'accessControl',
		);
	}
	
	
	/*
		����� �������
	*/
	public function accessRules()
	{
		return array(
			// ���� ������ ������ �������
			array(
				'allow',
				'roles'=>array('admin'),
			),
                                    // ���� ��������� ��������� ���������� ������ �� �������� �����������
			array(
				'allow',
        'actions'=>array('login'),
        'users'=>array('?'),
      ),
			// ��������� ��� ���������
			array(
				'deny',
				'users'=>array('*'),
			), 
		);		
	}
}
?>