<?php

use yii\db\Migration;

/**
 * Class m200114_152023_create_table_guruhlar
 */
class m200115_152023_create_guruhlar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%guruhlar}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
        ]);
       // $this->addForeignKey("ranks_fk", "{{%ranks}}", "level", "{{%user}}", "level", 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%guruhlar}}');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200114_152023_create_table_guruhlar cannot be reverted.\n";

        return false;
    }
    */
}
