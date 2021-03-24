<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%guruh_student}}`.
 */
class m200115_153036_create_guruh_student_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%guruh_student}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'dars_vaqti'=>$this->date(),
            'telefon' => $this->string(),
            'guruh_id' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%guruh_student}}');
    }
}
