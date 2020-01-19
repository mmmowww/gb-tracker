<?php
use yii\db\Migration;
/**
 * Class m200116_164450_add_is_template_columt_to_task_table
 */
class m200116_164450_add_is_template_columt_to_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('task', 'is_template', $this->boolean());
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('task', 'is_template');
    }
    