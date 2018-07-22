<?php

class SiteController extends Controller
{
    public $layout='//layouts/front_main';
    
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
	   $current_user = '';
       $current_action = '';
       $available_bonus = '';
       
	   if (isset($_POST['set_default']))
       {
            Users::model()->setDefault();
       }
       
	   if ((isset($_POST['login_field'])) && (!empty($_POST['login_field'])))
       {
            $user_data = Users::model()->find('user_name = "'.$_POST['login_field'].'"');
            
            if (isset($user_data))
            {
                $current_user = $user_data;
                if ($current_user->bonuses_status_value->name == 'new')
                {
                    if (isset($_POST['cancel_bonus']))
                    {
                        $current_action = 'cancel';                    
                    }
                
                    if (isset($_POST['get_bonus']))
                    {
                        $current_action = 'get_bonus';  
                        $available_bonus = Bonuses::model()->getBonuses($user_data->id, $user_data->count_points);                   
                    }                                                 
                }
            }
            else
            {
                Yii::app()->user->setFlash('message', Yii::t('app', 'Пользователя не существует.'));                
            }
       }
       else
       {
            Yii::app()->user->setFlash('message', Yii::t('app', 'Заполните поле логин.'));        
       }       
       
        $users_data = Users::model()->findAll();
        	   
        $this->render('bonuses',array(
            'users_data' => $users_data, 
            'current_user' => $current_user, 
            'current_action' => $current_action,
            'available_bonus' => $available_bonus
            ));	
	}

}