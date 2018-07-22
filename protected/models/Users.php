<?php

class Users extends CActiveRecord
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
		return 'tbl_users';
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
            'bonuses_status_value'=>array(self::BELONGS_TO, 'BonusesStatus', 'bonuses_status_id'),
            //'posts'=>array(self::HAS_MANY, 'Post', 'author_id'),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_name' => 'Login',
			'bonuses_status_id' => 'Статус бонуса',
            'count_points' => 'Количество баллов лояльности',
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
		$criteria->compare('user_name',$this->user_name);
		$criteria->compare('bonuses_status_id',$this->bonuses_status_id);
        $criteria->compare('count_points',$this->count_points);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    public function setDefault()
    {
        $command = Yii::app()->db->createCommand();
        $command->update('tbl_users', array('bonuses_status_id'=>1));
        
        $command = Yii::app()->db->createCommand();
        $command->update('tbl_bonuses', array('count'=>20), 'id=:id', array(':id'=> 1));

        $command = Yii::app()->db->createCommand();
        $command->update('tbl_bonuses', array('count'=>-1), 'id=:id', array(':id'=> 2));
        
        $command = Yii::app()->db->createCommand();
        $command->update('tbl_bonuses', array('count'=>20), 'id=:id', array(':id'=> 3));                                
    }    
}