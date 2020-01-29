<?
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Edit task';

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
    

<?

foreach($MyTask as $Task){

echo Html::tag('tr');   
 echo Html::tag('th');
  echo Html::tag('th',$Task['id']);
  echo Html::tag('th',$Task['username']);
  echo Html::tag('th',$Task['nameTask']);
  echo Html::tag('th',$Task['manualTask']);
  echo Html::tag('th',$Task['priority']);
  echo Html::tag('th',$Task['ProjectStatus']);
  echo Html::tag('th',$Task['idProject']);
   
echo Html::tag('/tr');



};
        
?>

</table>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5">
            <?php $edit = ActiveForm::begin(); ?>

                <?=$edit->field($EditTask, 'TaskName') ?>

                <?=$edit->field($EditTask, 'TaskManual') ?>

                <?=$edit->field($EditTask, 'UserName') ?>

                <?=$edit->field($EditTask, 'dataCreate') ?>

                <?=$edit->field($EditTask, 'dataUpdate') ?>

                <div class="form-group">
                    <?= Html::submitButton('Отредоктировать', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
