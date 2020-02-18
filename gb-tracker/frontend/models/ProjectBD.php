<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;


class ProjectBD extends ActiveRecord
{
	//// Уровень доступа
	public $id; 
	public $nameProject; // Имя проэкта
	public $manualProject; // Описание
	public $priority; // Приоритет
	public $ProjectStatus; // Статус
	public $ProjectJSON; // Само описание проэкта 
	public static function tableName()
    {
        return "project";
    }

}
?>