<?php

use yii\db\Migration;

/**
 * Class m200115_091045_Chat_log
 */
class m200115_091045_Chat_log extends Migration
{

     
    public function safeUp()
    {
        $this->addColumn('chat_log', 'type', $this->tinyInteger());
    }
   
    public function safeDown()
    {
        $this->dropColumn('chat_log', 'type');
    }
}
