<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;


class formTask extends ActiveRecord
{
 //// Уровень доступа
public $id;
public $username;
public $nameTask;
public $manualTask;
public $priority;
public $ProjectStatus;
public $idProject; 

	public static function tableName()
    {
        return "task";
    }

}
?>