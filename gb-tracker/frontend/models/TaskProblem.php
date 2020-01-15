<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;


class TaskProblem extends ActiveRecord
{
public $id;
public $TaskName;
public $TaskManual;
public $UserName;
public $dataCreate;
public $dataUpdate;



	public static function tableName()
    {
        return "taskproblem";
    }

}
?>