<?php

use yii\db\Migration;

/**
 * Handles the creation of table `customer_type`.
 */
class m170113_155923_create_customer_type_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('customer_type', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('customer_type');
    }
}
