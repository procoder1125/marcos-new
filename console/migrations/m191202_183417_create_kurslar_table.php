<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%kurslar}}`.
 */
class m191202_183417_create_kurslar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%kurslar}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'davomiylik' => $this->string(),
            'dars_vaqti' => $this->string(10),
            'oylik_tolov' => $this->string(),
            'batafsil' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%kurslar}}');
    }
}
