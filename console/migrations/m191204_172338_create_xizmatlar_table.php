<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%xizmatlar}}`.
 */
class m191204_172338_create_xizmatlar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%xizmatlar}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'batafsil' => $this->text(),
            
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%xizmatlar}}');
    }
}
