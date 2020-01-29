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
            'ProjectJSON' =>$this->text(),   /// C json он работать не хочет первёл на текст

        ]);
            $sql = "CREATE TRIGGER ProjectСreation
            AFTER INSERT
            ON `Project` FOR EACH ROW BEGIN INSERT INTO `chat_log` (`id`, `username`, `created_at`, `message`, `type`) VALUES (NULL, 'Оповещение', NULL, 'Внимание создан новый Проект!\r\nВсем всем с ним ознакомиться', NULL); END*";
            $this->execute($sql);
            $sql = ''; //Чистим переменную
            $sql = "CREATE TRIGGER ProjectUpdate
            AFTER UPDATE 
            ON `Project` FOR EACH ROW BEGIN 
            SET NEW.id = LEFT(NEW.id);
            SET NEW.nameProject = LEFT(NEW.nameProject);
            SET NEW.manualProject = LEFT(NEW.manualProject);
            SET NEW.priority = LEFT(NEW.priority);
            SET NEW.ProjectStatus = LEFT(NEW.ProjectStatus);
            SET NEW.ProjectJSON = LEFT(NEW.ProjectJSON);
            BEGIN INSERT INTO `chat_log` (`id`, `username`, `created_at`, `message`, `type`) VALUES (NULL, 'Оповещение', NULL, 'Внимание обновлён Проект!\r\nВсем всем с ним ознакомиться', NULL); END*";
            $this->execute($sql);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {     $sql = "DROP TRIGGER ProjectСreation";
            $this->execute($sql);
            $sql ='';
             $sql = "DROP TRIGGER ProjectUpdate";
            $this->execute($sql);
       $this->dropTable('Project');
    }

  
}
