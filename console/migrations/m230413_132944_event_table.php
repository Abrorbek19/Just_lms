<?php

use yii\db\Migration;

/**
 * Class m230413_132944_event_table
 */
class m230413_132944_event_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('event', [
                'event_id' => $this->primaryKey(),

                'event_name'=>$this->string()->notNull(),
                'event_description'=>$this->string()->notNull(),
                'event_date'=>$this->date()->notNull(),
                'status' => $this->smallInteger()->notNull()->defaultValue(10),
                'created_at'=>$this->timestamp()->null()->defaultExpression('CURRENT_TIMESTAMP'),
                'created_by'=>$this->string(50)->notNull(),
                'updated_at'=>$this->timestamp()->null()->append('ON UPDATE CURRENT_TIMESTAMP'),
                'updated_by'=>$this->string(50)->null(),
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230413_132944_event_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230413_132944_event_table cannot be reverted.\n";

        return false;
    }
    */
}
