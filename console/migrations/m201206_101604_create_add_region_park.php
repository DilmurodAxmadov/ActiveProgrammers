<?php

use yii\db\Migration;

/**
 * Class m201206_101604_create_add_insert_park
 */
class m201206_101604_create_add_region_park extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('region',
            [
                'name_uz' => 'Qoraqalpogiston Respublikasi',
                'name_ru' => 'Республика Каракалпакстан',
                'name_en' => 'Republic of Karakalpakstan',
            ]);

        $this->insert('region',
            [
                'name_uz' => 'Jizzax viloyati',
                'name_ru' => 'Джиззакская область',
                'name_en' => 'Djizzakh region',
            ]);

        $this->insert('region',
            [
                'name_uz' => 'Surxandaryo viloyati',
                'name_ru' => 'Сурхандарьинская область',
                'name_en' => 'Surkhandarya region',
            ]);

        $this->insert('region',
            [
                'name_uz' => 'Qashqadaryo viloyati',
                'name_ru' => 'Кашкадарьинская область',
                'name_en' => 'Kashkadarya region',
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
