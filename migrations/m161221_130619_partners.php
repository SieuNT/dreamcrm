<?php

use yii\db\Migration;

class m161221_130619_partners extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%partner}}', [
            'id' => $this->primaryKey(),
            'project_id' => $this->integer(),
            'full_name' => $this->string()->notNull(),
            'phone_number' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'start_date' => $this->date()->notNull(),
            'end_date' => $this->date()->notNull(),
            'contract_value' => $this->money(8,2),
            'real_value' => $this->money(8,2),

            'notes' => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext')->comment('Ghi chú'),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('fk_partner_project', '{{%partner}}', 'project_id', '{{%project}}', 'id');
    }

    public function down()
    {
        $this->dropTable('{{%partner}}');
    }
}
