<?php 

namespace app\models;

use yii\helpers\ArrayHelper;

trait ListableTrait
{
    /**
     * @return array
     */
    public static function getList($labelAttr = 'nama')
	{
		$query = self::find();
		return ArrayHelper::map($query->all(), 'id', $labelAttr);
	}
}
