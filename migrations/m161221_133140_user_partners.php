<?php

use yii\db\Migration;

class m161221_133140_user_partners extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user_partner}}', [
            'user_id' => $this->integer()->notNull(),
            'partner_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('fk_user_partner_user', '{{%user_partner}}', 'user_id', '{{%user}}', 'id');
        $this->addForeignKey('fk_user_partner_partner', '{{%user_partner}}', 'partner_id', '{{%partner}}', 'id');
    }

    public function down()
    {
        $this->dropTable('{{%user_partner}}');
    }
}
