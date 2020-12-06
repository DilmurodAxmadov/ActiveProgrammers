<?php

use yii\db\Migration;

/**
 * Class m201206_125806_create_add_park_id_to_tree
 */
class m201206_125806_create_add_park_id_to_tree extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('trees','park_id',$this->integer());

        $this->createIndex('{{%idx-trees-park_id}}', '{{%trees}}', 'park_id');
        $this->addForeignKey('{{%fk-trees-park_id}}', '{{%trees}}', 'park_id', '{{%park}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201206_125806_create_add_park_id_to_tree cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201206_125806_create_add_park_id_to_tree cannot be reverted.\n";

        return false;
    }
    */
}
