<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
// тут две формы, выбрать которую оставить
print_r($CreateNewTask);
echo "</br>";
var_dump($CreateNewTask);
?>

	 	 	 	 	 	 	 
<h1>Создать задачу</h1>
<h3>Имя задачи</h3>
<?= Html::input('text', 'nameTask', $user->class, ['class' => 'nameTask']) ?>
</br>
<h3>Описание задачи</h3>
<?= Html::input('text', 'manualTask', $user->class, ['class' => 'manualTask']) ?>
<h3>Автор выполнения задачи</h3>
<?= Html::input('text', 'username', $user->class, ['class' => 'username']) ?>
</br>
<h3>Приоритет</h3>
<?= Html::input('text', 'priority', $user->class, ['class' => 'priority']) ?>
</br>
<h3>Стадия выполнения</h3>
<?= Html::input('text', 'ProjectStatus', $user->class, ['class' => 'ProjectStatus']) ?>
</br>
<h3>id Проэкта</h3>
<?= Html::input('text', 'idProject', $user->class, ['class' => 'idProject']) ?>
</br>
<h3>Имя задачи</h3>
<?= Html::input('submit', '', $user->name, ['class' => $username]) ?>
</br>
-----------
</br>
<?php $form = ActiveForm::begin() ?>
    <?= $form->field($formT, 'nameTask') ?>
    <?= $form->field($formT, 'manualTask') ?>
     <?= $form->field($formT, 'username') ?>
      <?= $form->field($formT, 'priority') ?>
       <?= $form->field($formT, 'ProjectStatus') ?>
        <?= $form->field($formT, 'idProject') ?>
    <?= Html::submitButton('Send', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end() ?>




<h2>Вывод текущих задач</h2>
<?
var_dump($Task);
foreach ($Task as $MyTask) {
	

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