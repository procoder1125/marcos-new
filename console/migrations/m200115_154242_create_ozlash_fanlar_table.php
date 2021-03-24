<?php

use yii\db\Migration;

/**
 * Class m200114_154242_create_ozlash_fanlar_guruhlar
 */
class m200115_154242_create_ozlash_fanlar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ozlash_fanlar}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'davomiyligi' => $this->integer()->notNull(),
            'guruh_id' => $this->integer()->notNull(),    
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ozlash_fanlar}}');

    
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200114_154242_create_ozlash_fanlar_guruhlar cannot be reverted.\n";

        return false;
    }
    */
}
