<?php

use yii\db\Migration;

/**
 * Class m230508_111434_books_table
 */
class m230508_111434_books_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('books',[
            'books_id'=>$this->primaryKey(),
            'group_id'=>$this->string()->notNull(),
            'books_name'=>$this->string()->notNull(),
            'books_image'=>$this->string()->notNull(),
            'books_upload'=>$this->string()->notNull(),
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
        echo "m230508_111434_books_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230508_111434_books_table cannot be reverted.\n";

        return false;
    }
    */
}
