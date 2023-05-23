<?php

use yii\db\Migration;

/**
 * Class m230502_080435_profile_table
 */
class m230502_080435_profile_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('profile',[
            'profile_id'=>$this->primaryKey(),
            'full_name'=>$this->string(500)->notNull(),
            'description'=>$this->string(500)->notNull(),
            'image'=>$this->string(200)->notNull(),
            'address'=>$this->string()->notNull(),
            'email'=>$this->string()->notNull(),
            'date_of_birth'=>$this->string()->notNull(),
            'phone'=>$this->string(100)->notNull(),
            'status'=>$this->string(500)->notNull(),
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
        echo "m230502_080435_profile_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230502_080435_profile_table cannot be reverted.\n";

        return false;
    }
    */
}
