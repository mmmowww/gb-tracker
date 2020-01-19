<?php

use yii\db\Migration;

/**
 * Class m200118_141403_Project
 */
class m200118_141403_Project extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
            $this->createTable('Project', [
            'id' => $this->primaryKey(),
            'nameProject' => $this->string(),
            'manualProject' => $this->text(),
            'priority'=>$this->integer(), //0,1,2,3 0- Самое важное,1 - менее и т.д.
            'ProjectStatus'=>$this->text(), //Начато Выполняеться Выполненно, Сданно,
            'ProjectJSON' =>$this->json(),   /// Вот тут себе голову сломал.
            // Изночалаьно не мог какими хорактиристиками должен обладать "Проэкт"
            // По этому посчитал что пускай он описваеться отдельными данными JSON

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropTable('Project');
    }

  
}
