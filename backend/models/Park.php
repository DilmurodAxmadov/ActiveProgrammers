<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "park".
 *
 * @property int $id
 * @property string|null $name_uz
 * @property string|null $address_uz
 * @property string|null $description_uz
 * @property string|null $name_ru
 * @property string|null $address_ru
 * @property string|null $description_ru
 * @property string|null $name_en
 * @property string|null $address_en
 * @property string|null $description_en
 * @property int|null $region_id
 *
 * @property Region $region
 */
class Park extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'park';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['region_id'], 'integer'],
            [['name_uz', 'address_uz', 'description_uz', 'name_ru', 'address_ru', 'description_ru', 'name_en', 'address_en', 'description_en'], 'string', 'max' => 255],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_uz' => 'Name Uz',
            'address_uz' => 'Address Uz',
            'description_uz' => 'Description Uz',
            'name_ru' => 'Name Ru',
            'address_ru' => 'Address Ru',
            'description_ru' => 'Description Ru',
            'name_en' => 'Name En',
            'address_en' => 'Address En',
            'description_en' => 'Description En',
            'region_id' => 'Region ID',
        ];
    }

    /**
     * Gets query for [[Region]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'region_id']);
    }
}
