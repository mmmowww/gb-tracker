<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;


class DBcomunication extends ActiveRecord
{
	
	public static function tableName()
    {
        return "Task";
    }

}