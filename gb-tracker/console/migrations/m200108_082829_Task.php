<?php

use yii\db\Migration;

/**
 * Class m200108_082829_Task
 */
class m200108_082829_Task extends Migration
{
    
    public function safeUp()
    {
    $this->createTable('Task',[
            'id' => $this->primaryKey(),
            'username' => $this->string(),
            'nameTask' => $this->text(),
            'manualTask' => $this->text(),
            'priority'=>$this->integer(), //0,1,2,3 0- Самое важное,1 - менее и т.д.
            'ProjectStatus'=>$this->text(), //Начато Выполняеться Выполненно, Сданно,
            'idProject'=>$this->integer(),
        ]); // Впервые такое делаю
   // $this->addForeignKey('fk-ProjectManual', // название связи
   //                             'Task', // текущая тавблица
   //                             'idProject', // Калонка для связи
   //                             'Project', // "дочерняя" таблица
   //                             'id'); // колонка из дочерней таблицы
    // Хотел сделать карсиво, через внешний ключ откзываеться работать
    // Пришлось "нашеноковать"
     
                           
   
    }

   
    public function safeDown()
    {
           
         $this->dropTable('Task');
    }

   
}

