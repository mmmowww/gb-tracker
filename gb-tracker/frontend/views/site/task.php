<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>
<h1>  This Task  </h1>

<h2> Задачи </h2>

<?php
//var_dump($Task);
 
foreach ($Task as $MyTask) {
	echo "</br>";
	echo '<a href = "'.Url::to(['site/concretokaltask','id'=>$MyTask['id']]).'">('.$MyTask['TaskName']. ') Номер :'.$MyTask['id'].'</a>';
	echo "</br>";
	echo "Task Manual";
	echo "</br>";
	echo $MyTask['TaskManual']; 
	echo "</br>";
	echo "Исполняет: ".$MyTask['UserName'];
	echo "</br>--------</br>";
}
?>

<h2>Чат</h2>
<h2>THIS IS CHAT!</h2>
<div id="chat" style="min-height: 100px; border-color: #1c7430; border: 2px;"></div>
    <div id="response" style="color:#D00"></div>
    <div class="row">
        <div class="col-lg-9">
            <?= \yii\helpers\Html::textInput('message', '', ['id' => 'message', 'class' => 'form-control'])?>
        </div>

        <div class="col-lg-3">
            <?= \yii\helpers\Html::button('Отправить', ['id' => 'send', 'class' => 'btn btn-primary'])?>
        </div>
    </div>
<?php if (Yii::$app->user->isGuest) {
    $username = 'guest' . time();
} else {
    $username = Yii::$app->user->identity->username;
} ?>
<?= \yii\helpers\Html::hiddenInput('username', $username, ['class' => 'js-username']) ?>



<?
//48.49
?>