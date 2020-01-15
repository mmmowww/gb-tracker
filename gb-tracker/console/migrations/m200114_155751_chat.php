<?php

use yii\db\Migration;


class m200114_155751_chat extends Migration
{
  
    public function safeUp()
    {
        $this->createTable("chat_log",[
            'id'=>$this->primaryKey(),
            'username'=>$this->string(),
            'created_at'=>$this->bigInteger(),
            'message'=>$this->text(),
        ]);

    }

    public function safeDown()
    {
        $this->dropTable("chat_log");
    }

   
}
