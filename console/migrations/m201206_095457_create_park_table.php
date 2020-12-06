<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%park}}`.
 */
class m201206_095457_create_park_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%park}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'address' => $this->string(),
            'description' => $this->string(),
            'region_id' => $this->integer(),
        ]);

        $this->createIndex('{{%idx-park-region_id}}', '{{%park}}', 'region_id');
        $this->addForeignKey('{{%fk-park-region_id}}', '{{%park}}', 'region_id', '{{%region}}', 'id', 'RESTRICT', 'RESTRICT');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%park}}');
    }
}
