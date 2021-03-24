<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%kontakt}}`.
 */
class m191422_132214_create_messages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%messages}}', [
            'id' => $this->primaryKey(),
            'from' => $this->string()->notNull(),
            'to' => $this->string()->notNull(),
            'name' => $this->string()->notNull(), 
            'description' => $this->text(),
            'created_at' => $this->dateTime()->notNull(),
            'filename' => $this->string(),
            'user_id' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%messages}}');
    }
}
