<?php

use yii\db\Migration;

/**
 * Class m230402_082648_users_table
 */
class m230402_082648_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'user_id' => $this->primaryKey(),
            'first_name'=>$this->string(100)->notNull(),
            'last_name'=>$this->string(100)->notNull(),
            'role'=>$this->integer(10)->notNull(),

            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password' => $this->string()->notNull(),
            'email' => $this->string()->notNull()->unique(),

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
        echo "m230402_082648_users_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230402_082648_users_table cannot be reverted.\n";

        return false;
    }
    */
}
