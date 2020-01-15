<?php

use yii\helpers\Html;
use yii\helpers\Url;

var_dump($Task);
foreach ($Task as $MyTask) {
	# code...

echo "</br>-----</br>";
echo "Имя таска ".$MyTask["TaskName"];
echo "</br>";
echo "Описание задачи ".$MyTask["TaskManual"];
echo "</br>";
echo "Чья задача ".$MyTask["UserName"];
echo "</br>";
echo "Дата создания задачи ".$MyTask["dataCreate"];
echo "</br>";
echo "Дата обновления задачи ".$MyTask["dataUpdate"];
echo "</br>";
echo "</br>-----</br>";
echo "Отредоктировать? </br>";
echo "<button>Нет</button> </br>";
echo '<button><a href = "'.Url::to(['site/edittask','id'=>$MyTask['id']]).'">Преступить к редоктированию</a></button></br>';
}
?>