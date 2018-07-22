<?php


class Bonuses extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserRole the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_bonuses';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{

	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Название бонуса',
            'description' => 'Описание бонуса',
            'min' => 'Минимальное значение',
            'max' => 'Максимальное значение',
            'count' => 'Наличие',
            
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title);
        $criteria->compare('description',$this->description);
        $criteria->compare('min',$this->min);
        $criteria->compare('max',$this->max);
        $criteria->compare('count',$this->count);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    public function getBonuses($user_id = null, $count_points = 0)
    {
        $bonuses_type = '';
        
        //get available bonuses
        $sql = "SELECT * FROM `tbl_bonuses` where count <> 0 ORDER BY RAND() LIMIT 1";    
        $bonuses_type = Yii::app()->db->createCommand($sql)->queryAll();
        
        if ($bonuses_type[0]['bonuses_type'] == 'range')
        {
            $bonuses_type[0]['bonus_value'] = rand($bonuses_type[0]['min'],$bonuses_type[0]['max']);

            if ($bonuses_type[0]['title'] == 'points')
            {
                $count_points += $bonuses_type[0]['bonus_value'];             
            }                        
        }
        else
        {
            $sql = "SELECT * FROM `tbl_gifts` ORDER BY RAND() LIMIT 1";    
            $bonuses_item = Yii::app()->db->createCommand($sql)->queryAll();
            $bonuses_type[0]['bonus_value'] = $bonuses_item[0]['name'];             
        }
        
        
        // change user status        
        $command = Yii::app()->db->createCommand();
        $command->update('tbl_users', array('bonuses_status_id'=>2, 'count_points' => $count_points), 'id=:id', array(':id'=>$user_id));
        
        //change count bonuses
        $new_count = ((int)$bonuses_type[0]['count']) - 1;
        $command = Yii::app()->db->createCommand();
        $command->update('tbl_bonuses', array('count'=>$new_count), 'id=:id', array(':id'=>$bonuses_type[0]['id']));        
        
        return $bonuses_type;        
    }    
}