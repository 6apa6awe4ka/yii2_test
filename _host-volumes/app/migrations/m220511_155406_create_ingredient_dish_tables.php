<?php

use yii\db\Migration;

/**
 * Class m220511_155406_create_ingredient_dish_tables
 */
class m220511_155406_create_ingredient_dish_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ingredient}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);

        $this->createTable('{{%dish}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);

        $this->createTable('{{%dish_ingredient}}', [
            'dish_id' => $this->integer()->notNull(),
            'ingredient_id' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey(
            'fk-dish_ingredient-dish_id',
            'dish_ingredient',
            'dish_id',
            'dish',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-dish_ingredient-ingredient_id',
            'dish_ingredient',
            'ingredient_id',
            'ingredient',
            'id',
            'RESTRICT'
        );
        $this->addPrimaryKey(
            'pk-dish_ingredient',
            'dish_ingredient',
            ['dish_id', 'ingredient_id']
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%dish_ingredient}}');
        $this->dropTable('{{%ingredient}}');
        $this->dropTable('{{%dish}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220511_155406_create_ingredient_dish_tables cannot be reverted.\n";

        return false;
    }
    */
}
