<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%kurs_rejasi}}`.
 */
class m191205_183910_create_kurs_rejasi_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%kurs_rejasi}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'kurs_id' => $this->integer() ,
            'batafsil' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%kurs_rejasi}}');
    }
}
