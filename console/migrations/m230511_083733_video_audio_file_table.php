<?php

use yii\db\Migration;

/**
 * Class m230511_083733_video_audio_file_table
 */
class m230511_083733_video_audio_file_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('video_audio_file',[
            'video_audio_file_id'=>$this->primaryKey(),
            'library_category'=>$this->string()->notNull(),
            'week_category'=>$this->string()->notNull(),
            'audio_title'=>$this->string()->null(),
            'audio_voice'=>$this->string()->null(),
            'video_title'=>$this->string()->null(),
            'video'=>$this->string()->null(),
            'file_title'=>$this->string()->null(),
            'image'=>$this->string()->null(),
            'file_upload'=>$this->string()->null(),
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
        echo "m230511_083733_video_audio_file_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230511_083733_video_audio_file_table cannot be reverted.\n";

        return false;
    }
    */
}
