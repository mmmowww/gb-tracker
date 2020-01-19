<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>
<h1>  This Task  </h1>

<h2> Задачи </h2>

<?php
 $Task1= $Task['0'];
var_dump($Task1);
 

foreach ($Task1 as $MyTask) {
	
 $id = $MyTask[0];

 $user = $MyTask[1]; 
 $nameTask = $MyTask[2]; 
 $manual = $MyTask[3];
 $priority = $MyTask[4];
 $status = $MyTask[5];
 $idproject = $MyTask[6];


echo "--</br(-->";
 echo $id = iconv("ASCII","UTF-8",$id);
 echo "--)</br-->";
 $user = iconv("ASCII","UTF-8",$user); 
 $nameTask = iconv("ASCII","UTF-8",$nameTask); 
 $manual = iconv("ASCII","UTF-8",$manual);
 $priority = iconv("ASCII","UTF-8",$priority);
 $status = iconv("ASCII","UTF-8",$status);
 $idproject = iconv("ASCII","UTF-8",$idproject);

	echo "</br>";
	echo '<a href = "'.Url::to(['site/concretokaltask',['id'=>$idproject]]).'">('.$name.') Номер :'.$id.'</a>';
	echo "</br>";
	echo "Task Manual";
	echo "</br>";
	echo $manual; 
	echo "</br>";
	echo "Исполняет: ".$user;
	echo "</br>--------</br>";

};








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


