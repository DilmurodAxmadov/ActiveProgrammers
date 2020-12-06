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
            'name_uz' => $this->string(),
            'address_uz' => $this->string(),
            'description_uz' => $this->string(),
            'name_ru' => $this->string(),
            'address_ru' => $this->string(),
            'description_ru' => $this->string(),
            'name_en' => $this->string(),
            'address_en' => $this->string(),
            'description_en' => $this->string(),
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
