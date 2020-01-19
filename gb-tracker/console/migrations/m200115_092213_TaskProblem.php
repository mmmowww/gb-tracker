<?php

use yii\db\Migration;

/**
 * Class m200115_092213_TaskProblem
 */
class m200115_092213_TaskProblem extends Migration
{
    
    public function safeUp()
    {



$this->createTable('TaskProblem', [
            'id' => $this->primaryKey(),
            'TaskName' => $this->string(),
            'TaskManual' => $this->text(),
            'UserName' =>$this->text(),
            'dataCreate' => $this->text(),
            'dataUpdate' => $this->text(),
        ]);
    }

   
    public function safeDown()
    {
    $this->dropTable('TaskProblem');
    }
}
