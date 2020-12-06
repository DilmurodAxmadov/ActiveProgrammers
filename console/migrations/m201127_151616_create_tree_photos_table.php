<?php

use yii\db\Migration;

class m201127_151616_create_tree_photos_table extends Migration
{

    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%tree_photos}}', [
            'id' => $this->primaryKey(),
            'tree_id' => $this->integer()->notNull(),
            'file' => $this->string()->notNull(),
            'sort' => $this->integer()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('{{%idx-tree_photos-tree_id}}', '{{%tree_photos}}', 'tree_id');
        $this->addForeignKey('{{%fk-tree_photos-tree_id}}', '{{%tree_photos}}', 'tree_id', '{{%trees}}', 'id', 'CASCADE', 'RESTRICT');

        $this->createIndex('{{%idx-trees-main_photo_id}}', '{{%trees}}', 'main_photo_id');
        $this->addForeignKey('{{%fk-trees-main_photo_id}}', '{{%trees}}', 'main_photo_id', '{{%tree_photos}}', 'id', 'SET NULL', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tree_photos}}');
    }
}
