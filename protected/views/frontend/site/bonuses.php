<? if(empty($users_data)) :?>
    <?=Yii::t('app', 'Не найдено ни одного пользователя')?>
<? else : ?>                
    <?=CHtml::beginForm($this->createUrl('/'))?>
    <div class="statistics">
        <div class="header_value"><h3><?=Yii::t('app', 'Данные для теста')?></h3></div>        
            <? foreach($users_data as $profile) :?>  
                <div class="user_cell">
                    <div class="user_name"><span><?=Yii::t('app', 'Login:')?> </span><?=$profile->user_name?></div>
                    <div class="user_status"><span><?=Yii::t('app', 'Status:')?> </span><?=$profile->bonuses_status_value->name?></div>
                    <div class="user_bonuses"><span><?=Yii::t('app', 'Bonuses count:')?> </span><?=$profile->count_points?></div>
                </div>                
            <? endforeach; ?>
    <?=CHtml::submitButton(Yii::t('app', 'Set default'), array('name' => 'set_default','class' => 'set_default'))?>    
    <?=CHtml::endForm()?>    
    </div>

    <?=CHtml::beginForm($this->createUrl('/'))?>
    
    <div class="info_message">        
        <? if (Yii::app()->user->hasFlash('message')) {echo Yii::app()->user->getFlash('message');}?>
    
        <? if ((isset($current_user)) && (!empty($current_user->user_name))) : ?>
    
            <?=Yii::t('app', 'Добро пожаловать: ').$current_user->user_name.Yii::t('app', ' - Ваши текушие баллы лояльности: ').$current_user->count_points;?>
    
        <? endif; ?>

    </div>
    
    <? if ((isset($current_user)) && (!empty($current_user->user_name))) { ?>
        
        <? if ($current_action == 'cancel') { ?>
            <?=Yii::t('app', 'Вы отказались от бонуса.');?>        
        <? } elseif ($current_action == 'get_bonus')  {?>
            <?=Yii::t('app', 'Вы получили бонус.');?>        
            <?=$available_bonus[0]['description'];?>
            <?=Yii::t('app', ': ');?>
            <?=$available_bonus[0]['bonus_value'];?>            
        <? } else {?>
        
            <? if ($current_user->bonuses_status_value->name == 'new') { ?>
                <?=CHtml::submitButton(Yii::t('app', 'Получить'), array('name' => 'get_bonus','class' => 'get_bonus'))?>
                <?=CHtml::submitButton(Yii::t('app', 'Отказаться'), array('name' => 'cancel_bonus','class' => 'cancel_bonus'))?>     
                <?=CHtml::hiddenField('login_field', $current_user->user_name)?>                   
            <? } else {?>
                <?=Yii::t('app', 'Бонус уже получен.');?>        
            <? } ?>        
        
        <? } ?>
        
<a href="<?=$this->createUrl('/');?>">Home</a>    
    <? } else { ?>
        <div class="wrap">
            <?=CHtml::textField('login_field', '', array('id' => 'login_field', 'placeholder' => Yii::t('app', 'Login name')))?>
            <?=CHtml::submitButton(Yii::t('app', 'Login'), array('name' => 'login_button','class' => 'login_button'))?>            
        </div>    
    <? } ?>

    <?=CHtml::endForm()?>
    
<? endif; ?>                    