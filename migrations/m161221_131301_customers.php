<?php

use yii\db\Migration;

class m161221_131301_customers extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%customer}}', [
            'id' => $this->primaryKey(),
            'project_id' => $this->integer(),
            'partner_id' => $this->integer(),
            'full_name' => $this->string()->notNull(),
            'phone_number' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'delivery_date' => $this->dateTime()->notNull(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('fk_customer_project', '{{%customer}}', 'project_id', '{{%project}}', 'id');
        $this->addForeignKey('fk_customer_partner', '{{%customer}}', 'partner_id', '{{%partner}}', 'id');
    }

    public function down()
    {
        $this->dropTable('{{%customer}}');
    }
}
