<?php

use yii\db\Migration;

class m201127_151615_create_trees_table extends Migration
{

    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%trees}}', [
            'id' => $this->primaryKey(),
            'name_uz' => $this->string(),
            'name_ru' => $this->string()->notNull(),
            'name_en' => $this->string(),
            'description_uz' => $this->text(),
            'description_ru' => $this->text(),
            'description_en' => $this->text(),
            'special_signs_uz' => $this->text(),
            'special_signs_ru' => $this->text(),
            'special_signs_en' => $this->text(),
            'girth' => $this->integer()->notNull(),
            'planted_at' => $this->integer()->notNull(),
            'latitude' => $this->string()->notNull(),
            'longitude' => $this->string()->notNull(),
            'main_photo_id' => $this->integer(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%trees}}');
    }
}
