<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%email_confirm_token}}`.
 */
class m191220_055820_create_email_confirm_token_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->addColumn('{{%user}}', 'email_confirm_token', $this->string()->unique()->after('email'));
    }

    public function down()
    {
        $this->dropColumn('{{%user}}', 'email_confirm_token');
    }
}
