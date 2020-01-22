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
            'idProject'=>$this->integer()->primaryKey(),
        ]); // Впервые такое делаю
   // $this->addForeignKey('fk-ProjectManual', // название связи
   //                             'Task', // текущая тавблица
   //                             'idProject', // Калонка для связи
   //                             'Project', // "дочерняя" таблица
   //                             'id'); // колонка из дочерней таблицы
    // Хотел сделать карсиво, через внешний ключ откзываеться работать
    // Пришлось "нашеноковать"
     $this->createIndex(
            'fk_Task_For_Project',
            'Task',
            'Project'
        );
      $this->addForeignKey(
            'fk_Task_For_Project',
            'Task',
            'idProject',
            'Project',
            'id',
            'CASCADE'
        );
                           
    $sql = "CREATE TRIGGER TaskСreation
            AFTER INSERT
            ON `Task` FOR EACH ROW BEGIN INSERT INTO `chat_log` (`id`, `username`, `created_at`, `message`, `type`) VALUES (NULL, 'Оповещение', NULL, 'Внимание создана новая Задача!\r\nВсем всем с ним ознакомиться', NULL); END*";
            $this->execute($sql);
    }

   
    public function safeDown()
    {
            $sql = "DROP TRIGGER TaskСreation";
            $this->execute($sql);
         $this->dropTable('Task');
    }

   
}

