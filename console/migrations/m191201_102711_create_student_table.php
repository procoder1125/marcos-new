<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%student}}`.
 */
class m191201_102711_create_student_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%student}}', [
            'id' => $this->primaryKey(),
            'fullname' => $this->string()->notNull(),
            'phone' => $this->string()->notNull(),
            'dars_vaqti' => $this->string()->notNull(),
            'kurs_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%student}}');
    }
}
