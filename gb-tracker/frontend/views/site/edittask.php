<?
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Edit task';

?>
<?

        var_dump($user);
        var_dump($email);
        var_dump($password);
?>

<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $editTask = ActiveForm::begin(); ?>

                <?= $editTask->field($editTask, 'TaskName') ?>

                <?= $editTask->field($editTask, 'TaskManual') ?>

                <?= $editTask->field($editTask, 'UserName') ?>

                <?= $editTask->field($editTask, 'dataCreate') ?>

                <?= $editTask->field($editTask, 'dataUpdate') ?>








                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
