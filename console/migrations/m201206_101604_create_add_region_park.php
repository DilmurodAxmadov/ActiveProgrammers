<?php

use yii\db\Migration;

/**
 * Class m201206_101604_create_add_insert_park
 */
class m201206_101604_create_add_insert_park extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('park', [
            'name_uz' => 'Orol potensial geoparki',
            'address_uz' => '',
            'description_uz' => $this->string(),
            'name_ru' => $this->string(),
            'address_ru' => $this->string(),
            'description_ru' => $this->string(),
            'name_en' => $this->string(),
            'address_en' => $this->string(),
            'description_en' => $this->string(),
            'region_id' => $this->integer(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201206_101604_create_add_insert_park cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201206_101604_create_add_insert_park cannot be reverted.\n";

        return false;
    }
    */
}
