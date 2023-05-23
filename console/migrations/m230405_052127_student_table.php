<?php

use yii\db\Migration;

/**
 * Class m230405_052127_student_table
 */
class m230405_052127_student_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('student', [
                'student_id' => $this->primaryKey(),

                'user_id'=>$this->string()->notNull(),

                'phone_number'=>$this->string(50)->notNull(),

                'user_role'=>$this->integer()->notNull(),

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
        echo "m230405_052127_student_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230405_052127_student_table cannot be reverted.\n";

        return false;
    }
    */
}
