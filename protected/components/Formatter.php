<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Formatter
 *
 * @author abondar
 */
class Formatter extends CFormatter
{
	 public function formatBoolean($value){
            return $value ? Yii::t('app', $this->booleanFormat[1]) : Yii::t('app',$this->booleanFormat[0]);
    }
	
	 public function formatHeadline($value) {
        return '<b>' . $value . '</b>';
    }
}

?>
