<?php

use yii\db\Migration;

/**
 * Class m230410_091208_group
 */
class m230410_091208_group extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('group', [
                'group_id' => $this->primaryKey(),
                'group_name'=>$this->string()->notNull()->unique(),

                'lesson_days'=>$this->string()->notNull(),
                'lesson_time'=>$this->string()->notNull(),

                'teacher_id'=>$this->string()->notNull(),
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
        echo "m230410_091208_group cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230410_091208_group cannot be reverted.\n";

        return false;
    }
    */
}
