<?php
use yii\helpers\Html;
use yii\helpers\Url;
use stevad\xhprof;



?>
<h2>Текущий задача</h2>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>#</th>
      <th>id Проэкта</th>
      <th>Имя исполнителя</th>
      <th>Имя задачи</th>
      <th>Описание задачи</th>
      <th>Приоритет</th>
      <th>Статус</th>
      <th>Относиться к проэкту</th>
    </tr>
  </thead>
  <tbody>

<?php
 $Task1= $Task;



 

foreach ($Task as $MyTask) {
$id = $MyTask["id"];
 $user = $MyTask["username"]; 
 $nameTask = $MyTask["nameTask"]; 
 $manual = $MyTask["manualTask"];
 $priority = $MyTask["priority"];
 $status = $MyTask["ProjectStatus"];
 $idproject = $MyTask["idProject"];


	
    
    echo Html::tag('tr');   
 echo Html::tag('th');
  echo Html::tag('th',$MyTask['id']);
  echo Html::tag('th',$MyTask['username']);
  //$HREF =  Url::to(['site/concretokaltask',['id'=>$idproject]]);      // эти не работают
  //echo Html::a($MyTask['nameTask'],['site/concretokaltask','id'=>$id]); // эти не работают
  echo '<th><a href = "'.Url::to(['site/concretokaltask','id'=>$idproject]).'">'.$nameTask.'</a></th>'; //Мой костыль
  echo Html::tag('th',$MyTask['manualTask']);
  echo Html::tag('th',$MyTask['priority']);
  echo Html::tag('th',$MyTask['ProjectStatus']);
  echo Html::tag('th',$MyTask['idProject']);
   
echo Html::tag('/tr');

};






?>
</tbody>
</table>
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

<div class="chat-popup form-container">
    <div class="js-chat-content">
        <h1>Chat</h1>
        <div class="js-messages-content"></div>

        <label for="msg"><b>Message</b></label>
        <textarea id="message" placeholder="Type message.." name="msg" required></textarea>

        <button type="button" id="send" class="btn">Send</button>
        <button type="button" class="btn cancel js-hide">Hide</button>
    </div>
    <button type="button" style="display: none;" class="btn btn-primary js-show">Show</button>
</div>
<?= \yii\helpers\Html::hiddenInput('username', $username, ['class' => 'js-username']) ?>


<h2>Переигрывание</h2>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>#</th>
      <th>id Проэкта</th>
      <th>Имя исполнителя</th>
      <th>Имя задачи</th>
      <th>Описание задачи</th>
      <th>Приоритет</th>
      <th>Статус</th>
      <th>Относиться к проэкту</th>
    </tr>
  </thead>
  <tbody>
<?
$cashe = json_decode($cashe,true);
foreach ($cashe as $Mytask) {
   echo Html::tag('tr');   
 echo Html::tag('th');
  echo Html::tag('th',$MyTask['id']);
  echo Html::tag('th',$MyTask['username']);
  echo '<th><a href = "'.Url::to(['site/concretokaltask','id'=>$idproject]).'">'.$nameTask.'</a></th>'; //Мой костыль
  echo Html::tag('th',$MyTask['manualTask']);
  echo Html::tag('th',$MyTask['priority']);
  echo Html::tag('th',$MyTask['ProjectStatus']);
  echo Html::tag('th',$MyTask['idProject']);
   
echo Html::tag('/tr');

}

?>
</tbody>
</table>