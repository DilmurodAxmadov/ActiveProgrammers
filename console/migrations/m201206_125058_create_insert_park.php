<?php

use yii\db\Migration;

/**
 * Class m201206_125058_create_insert_park
 */
class m201206_125058_create_insert_park extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {$this->insert('{{%park}}',
        [
            'name_uz' => 'Orol potensial geoparki',
            'address_uz' => 'Moynoq, Sharqiy Ustyurt, Orol Dengizi, Chink',
            'description_uz' => 'Ilmiy, ekstremal, istiqbolda o`quv va ommaviy turizm',
            'name_ru' => 'Геопарк Аральский потенциальный',
            'address_ru' => 'Муйнак, Восточный устюрт, Аральское море, Чинк',
            'description_ru' => 'Научный, экстремальный, в перспективе научный и туристический',
            'name_en' => null,
            'address_en' => null,
            'description_en' => null,
            'region_id' => null,
        ]);

        $this->insert('{{%park}}',
            [
                'name_uz' => 'Sulton Uvays potensial geoparki',
                'address_uz' => 'Qorao`zak, Beruniy, Xo`jako`l botiqligining Sharqiy tomoni',
                'description_uz' => 'Ilmiy, o`quv va ommaviy turizm',
                'name_ru' => 'Геопарк Султан Увайс потенциальный',
                'address_ru' => 'Караузяк, Беруни, Восточная часть Хужакулского залива',
                'description_ru' => 'Научный, учебный и туристический',
                'name_en' => null,
                'address_en' => null,
                'description_en' => null,
                'region_id' => null,
            ]);

        $this->insert('{{%park}}',
            [
                'name_uz' => 'Hisor potensial geoparki',
                'address_uz' => 'Darbin-Hisor, Darband qorgoni, Boysintog tizmasi, Sherobod daryo havzasi, Laylakon qorgoni',
                'description_uz' => 'Ilmiy, oquv va ommaviy turizm',
                'name_ru' => 'Геопарк Гиссар потенциальный',
                'address_ru' => 'Дарбин-Гиссар, поселек Дарбанд, хребет Байсунтау, побережья озера Шеробод, поселек Лайлакон',
                'description_ru' => 'Научный, учебный и туристический',
                'name_en' => null,
                'address_en' => null,
                'description_en' => null,
                'region_id' => null,
            ]);

        $this->insert('{{%park}}',
            [
                'name_uz' => 'Bogambir potensial geoparki',
                'address_uz' => 'Forish Shimoliy Nuratovning Shimoliy etaklari Pastko`cha qishlog`i',
                'description_uz' => 'Ilmiy, o`quv va ommaviy turizm',
                'name_ru' => 'Геопарк Богамбир потенциальный',
                'address_ru' => 'Фариш Восточная часть Востоной Нураты, поселек Пасткуча',
                'description_ru' => 'Научный, учебный и туристический',
                'name_en' => null,
                'address_en' => null,
                'description_en' => null,
                'region_id' => null,
            ]);

        $this->insert('{{%park}}',
            [
                'name_uz' => 'Kitob potensial geoparki',
                'address_uz' => 'Qashqadaryo daryosi havzasidagi Zarafshon tizmasi janubi-g`arbiy tarmoqlari',
                'description_uz' => 'Ilmiy, o`quv va ommaviy turizm',
                'name_ru' => 'Геопарк Китабский потенциальный',
                'address_ru' => 'Побережья реки Кашкадарья, хребет Зарафшан, юго-западная чать',
                'description_ru' => 'Научный, учебный и туристический',
                'name_en' => null,
                'address_en' => null,
                'description_en' => null,
                'region_id' => null,
            ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201206_125058_create_insert_park cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201206_125058_create_insert_park cannot be reverted.\n";

        return false;
    }
    */
}
