<?php

namespace backend\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\VarDumper;
use yii\web\UploadedFile;
use yiidreamteam\upload\ImageUploadBehavior;

/**
 * This is the model class for table "tree_photos".
 *
 * @property int $id
 * @property int $tree_id
 * @property string $file
 * @property int $sort
 * @property int $status
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Trees $tree
 * @property Trees[] $trees
 */
class TreePhotos extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'tree_photos';
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tree_id' => Yii::t('app', 'Tree ID'),
            'file' => Yii::t('app', 'File'),
            'sort' => Yii::t('app', 'Sort'),
            'status' => Yii::t('app', 'Status'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public static function create(UploadedFile $file): self
    {
        $photo = new static();
        $photo->file = $file;
        return $photo;
    }

    public function setSort($sort): void
    {
        $this->sort = $sort;
    }

    public function isIdEqualTo($id): bool
    {
        return $this->id == $id;
    }

    public function behaviors(): array
    {
        return [
            TimestampBehavior::class,
            BlameableBehavior::class,
            [
                'class' => ImageUploadBehavior::class,
                'attribute' => 'file',
                'createThumbsOnRequest' => true,
//                'filePath' => '@staticRoot/images/[[attribute_product_id]]/[[id]].[[extension]]',
//                'fileUrl' => '@static/images/[[attribute_product_id]]/[[id]].[[extension]]',
//                'thumbPath' => '@staticRoot/cache/products/[[attribute_product_id]]/[[profile]]_[[id]].[[extension]]',
//                'thumbUrl' => '@static/cache/products/[[attribute_product_id]]/[[profile]]_[[id]].[[extension]]',

                'filePath' => '@backend/web/app-images/store/trees/[[attribute_tree_id]]/[[filename]].[[extension]]',
                'fileUrl' => '@url/app-images/store/trees/[[attribute_tree_id]]/[[filename]].[[extension]]',

                'thumbPath' => '@backend/web/app-images/cache/trees/[[attribute_tree_id]]/[[profile]]_[[filename]].[[extension]]',
                'thumbUrl' => '@url/app-images/cache/trees/[[attribute_tree_id]]/[[profile]]_[[filename]].[[extension]]',

                'thumbs' => [
                    'admin' => ['width' => 100, 'height' => 70],
                    'thumb' => ['width' => 640, 'height' => 480],
//                    'cart_list' => ['width' => 150, 'height' => 150],
//                    'cart_widget_list' => ['width' => 57, 'height' => 57],
//                    'catalog_list' => ['width' => 228, 'height' => 228],
//                    'catalog_product_main' => ['processor' => [new WaterMarker(750, 1000, '@frontend/web/image/logo.png'), 'process']],
//                    'catalog_product_additional' => ['width' => 66, 'height' => 66],
//                    'catalog_origin' => ['processor' => [new WaterMarker(1024, 768, '@frontend/web/image/logo.png'), 'process']],
                ],
            ],
        ];
    }
}
