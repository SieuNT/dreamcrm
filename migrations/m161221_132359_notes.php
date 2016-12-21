<?php

use yii\db\Migration;

class m161221_132359_notes extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%note}}', [
            'id' => $this->primaryKey(),
            'customer_id' => $this->integer(),
            'notes' => $this->text()->comment('Ghi chú'),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('fk_note_customer', '{{%note}}', 'customer_id', '{{%customer}}', 'id');
    }

    public function down()
    {
        $this->dropTable('{{%note}}');
    }
}
