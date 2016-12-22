<?php

use yii\db\Migration;

class m161222_121858_customer_resoures extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%customer_resource}}', [
            'id' => $this->primaryKey(),
            'customer_id' => $this->integer(),
            'name' => $this->integer(),
            'content' => $this->text()->comment('Nội dung'),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('fk_customer_customer_resource', '{{%customer_resource}}', 'customer_id', '{{%customer}}', 'id');
    }

    public function down()
    {
        $this->dropTable('{{%customer_resource}}');
    }
}
