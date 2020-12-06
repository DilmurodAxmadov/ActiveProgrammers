<?php

namespace backend\models;

use common\models\User;
use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
use Yii;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

/**
 * This is the model class for table "trees".
 *
 * @property int $id
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string|null $description_uz
 * @property string|null $description_ru
 * @property string|null $description_en
 * @property string|null $special_signs_uz
 * @property string|null $special_signs_ru
 * @property string|null $special_signs_en
 * @property int|null $girth
 * @property int $planted_at
 * @property string $latitude
 * @property string $longitude
 * @property int|null $main_photo_id
 * @property int $status
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 *
 * @property TreePhotos $mainPhoto
 * @property TreePhotos[] $photos
 */
class Trees extends ActiveRecord
{

    public const STATUS_OK = 1;

    public static function tableName(): string
    {
        return 'trees';
    }


    public function rules()
    {
        return [
            [['name_ru', 'girth', 'planted_at', 'latitude', 'longitude'], 'required'],
            [['name_uz', 'name_ru', 'name_en'], 'string', 'max' => 255],

            [['description_uz', 'description_ru', 'description_en', 'special_signs_uz', 'special_signs_ru', 'special_signs_en'], 'string'],

            [['status'], 'integer'],
            [['status'], 'default', 'value' => self::STATUS_OK],

            [['latitude', 'longitude'], 'string', 'max' => 255],

            [['girth'], 'integer'],

            [['planted_at'], 'string'],

            //todo
            [['main_photo_id'], 'exist', 'skipOnError' => true, 'targetClass' => TreePhotos::class, 'targetAttribute' => ['main_photo_id' => 'id']],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name_uz' => Yii::t('app', 'Name Uz'),
            'name_ru' => Yii::t('app', 'Name Ru'),
            'name_en' => Yii::t('app', 'Name En'),
            'description_uz' => Yii::t('app', 'Description Uz'),
            'description_ru' => Yii::t('app', 'Description Ru'),
            'description_en' => Yii::t('app', 'Description En'),
            'special_signs_uz' => Yii::t('app', 'Special Signs Uz'),
            'special_signs_ru' => Yii::t('app', 'Special Signs Ru'),
            'special_signs_en' => Yii::t('app', 'Special Signs En'),
            'girth' => Yii::t('app', 'Girth(mm)'),
            'planted_at' => Yii::t('app', 'Planted At'),
            'latitude' => Yii::t('app', 'Latitude'),
            'longitude' => Yii::t('app', 'Longitude'),
            'main_photo_id' => Yii::t('app', 'Main Photo ID'),
            'status' => Yii::t('app', 'Status'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[TreePhotos]].
     *
     * @return ActiveQuery
     */
    public function getPhotos()
    {
        return $this->hasMany(TreePhotos::class, ['tree_id' => 'id'])->orderBy('sort');
    }

    /**
     * Gets query for [[MainPhoto]].
     *
     * @return ActiveQuery
     */
    public function getMainPhoto()
    {
        return $this->hasOne(TreePhotos::class, ['id' => 'main_photo_id']);
    }


    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    public function getUpdatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'updated_by']);
    }

    public function getGirthInSM()
    {
        return round($this->girth / 10, 1) . " см";
    }

    public function beforeDelete(): bool
    {
        if (parent::beforeDelete()) {
            foreach ($this->photos as $photo) {
                $photo->delete();
            }
            return true;
        }
        return false;
    }

    public function afterSave($insert, $changedAttributes): void
    {
        $related = $this->getRelatedRecords();
        parent::afterSave($insert, $changedAttributes);
        if (array_key_exists('mainPhoto', $related)) {
            $this->updateAttributes(['main_photo_id' => $related['mainPhoto'] ? $related['mainPhoto']->id : null]);
        }
    }


    public function addPhoto(UploadedFile $file): void
    {
        $photos = $this->photos;
        $photos[] = TreePhotos::create($file);
        $this->updatePhotos($photos);
    }

    public function removePhotos(): void
    {
        $this->updatePhotos([]);
    }

    private function updatePhotos(array $photos): void
    {
        foreach ($photos as $i => $photo) {
            $photo->setSort($i);
        }
        $this->photos = $photos;
        $this->populateRelation('mainPhoto', reset($photos));
    }

    public function movePhotoUp($id): void
    {
        $photos = $this->photos;
        foreach ($photos as $i => $photo) {
            if ($photo->isIdEqualTo($id)) {
                if ($prev = $photos[$i - 1] ?? null) {
                    $photos[$i - 1] = $photo;
                    $photos[$i] = $prev;
                    $this->updatePhotos($photos);
                }
                return;
            }
        }
        throw new \DomainException(\Yii::t('app', 'Photo is not found.'));
    }

    public function movePhotoDown($id): void
    {
        $photos = $this->photos;
        foreach ($photos as $i => $photo) {
            if ($photo->isIdEqualTo($id)) {
                if ($next = $photos[$i + 1] ?? null) {
                    $photos[$i] = $next;
                    $photos[$i + 1] = $photo;
                    $this->updatePhotos($photos);
                }
                return;
            }
        }
        throw new \DomainException(\Yii::t('app', 'Photo is not found.'));
    }

    public function removePhoto($id): void
    {
        $photos = $this->photos;
        foreach ($photos as $i => $photo) {
            if ($photo->isIdEqualTo($id)) {
                unset($photos[$i]);
                $this->updatePhotos($photos);
                return;
            }
        }
        throw new \DomainException(\Yii::t('app', 'Photo is not found.'));
    }


    public function behaviors(): array
    {
        return [
            TimestampBehavior::class,
            BlameableBehavior::class,
            [
                'class' => AttributeBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['planted_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['planted_at'],
                ],
                'value' => function () {
                    return (int)strtotime($this->planted_at);
                },
            ],
            [
                'class' => SaveRelationsBehavior::class,
                'relations' => ['photos'],
            ],
        ];
    }
}
