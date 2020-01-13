<?php

use yii\db\Migration;


class m200107_150520_BdUser extends Migration
{

    public function safeUp()
    {
/*

II)По образу и подобию замутить ТАСК


*/


$this->createTable('BdUser', [
            'id' => $this->primaryKey(),
            'username' => $this->string(),
            'email' => $this->text(),
            'role' =>$this->integer(),
            'password' => $this->text(),
        ]);
    }

   
    public function safeDown()
    {
    $this->dropTable('BdUser');
    }

    
}
