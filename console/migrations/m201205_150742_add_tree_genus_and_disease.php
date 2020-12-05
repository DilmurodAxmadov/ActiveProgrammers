<?php

use backend\models\Trees;
use yii\db\Migration;

/**
 * Class m201205_150742_add_tree_genus_and_disease
 */
class m201205_150742_add_tree_genus_and_disease extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('trees', 'disease', $this->text());
        $this->addColumn('trees', 'genus_id', $this->integer()->notNull());

        Trees::updateAll(['genus_id' => 1]);

        $this->createIndex('{{%idx-trees-genus_id}}', '{{%trees}}', 'genus_id');
        $this->addForeignKey('{{%fk-trees-genus_id}}', '{{%trees}}', 'genus_id', '{{%genus}}', 'id', 'CASCADE', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201205_150742_add_tree_genus_and_disease cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201205_150742_add_tree_genus_and_disease cannot be reverted.\n";

        return false;
    }
    */
}
