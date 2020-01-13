<?php

use yii\db\Migration;

/**
 * Class m200108_082829_Task
 */
class m200108_082829_Task extends Migration
{
    
    public function safeUp()
    {
    $this->createTable('Task', [
            'id' => $this->primaryKey(),
            'username' => $this->string(),
            'nameTask' => $this->text(),
            'manualTask' => $this->text(),
        ]);
    }

   
    public function safeDown()
    {
         $this->dropTable('Task');
    }

   
}
