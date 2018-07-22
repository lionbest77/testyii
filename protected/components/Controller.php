<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

    public function renderCategory($data, $row) {
        if ($data->category instanceof Category) {
            return $data->category->name;
        } else {
            Yii::log(get_class($data->category));
            return '';
        }
    }

    public function renderColour($data, $row) {
        if ($data->colour instanceof Colour) {
            return $data->colour->name;
        } else {
            Yii::log(get_class($data->colour));
            return '';
        }
    }

    public function renderSize($data, $row) {
        if ($data->size instanceof Size) {
            return $data->size->name;
        } else {
            Yii::log(get_class($data->size));
            return '';
        }
    }

    public function renderRetailer($data, $row) {
        if ($data->retailer instanceof Retailer) {
            return $data->retailer->name;
        } else {
            Yii::log(get_class($data->retailer));
            return '';
        }
    }
}