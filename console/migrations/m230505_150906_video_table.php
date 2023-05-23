<?php

use yii\db\Migration;

/**
 * Class m230505_150906_video_table
 */
class m230505_150906_video_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('video',[
            'video_id'=>$this->primaryKey(),
            'group_id'=>$this->string()->notNull(),
            'video_title'=>$this->string()->notNull(),
            'video_upload'=>$this->string()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at'=>$this->timestamp()->null()->defaultExpression('CURRENT_TIMESTAMP'),
            'created_by'=>$this->string(50)->notNull(),
            'updated_at'=>$this->timestamp()->null()->append('ON UPDATE CURRENT_TIMESTAMP'),
            'updated_by'=>$this->string(50)->null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230505_150906_video_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230505_150906_video_table cannot be reverted.\n";

        return false;
    }
    */
}
