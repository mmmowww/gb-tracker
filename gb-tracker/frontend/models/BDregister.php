<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;


class BDregister extends ActiveRecord
{
	
	public static function tableName()
    {
        return "BdUser";
    }

}
?>