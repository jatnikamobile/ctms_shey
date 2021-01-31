<?php

namespace app\models;

use yii\helpers\ArrayHelper;

trait ListableTrait
{
    /**
     * @return array
     */
    public static function getList($filter = [], $labelAttr = 'nama')
    {
        $query = self::find()->andWhere($filter ?: []);
        return ArrayHelper::map($query->all(), 'id', $labelAttr);
    }
}
