<?php

namespace app\models\rs;

use Yii;

class BaseAR extends \yii\db\ActiveRecord
{
    public static function getDb()
    {
        return Yii::$app->get('db_rs');
    }
}
