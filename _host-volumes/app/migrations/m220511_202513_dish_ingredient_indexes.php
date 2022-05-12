<?php

use yii\db\Migration;

/**
 * Class m220511_202513_dish_ingredient_indexes
 */
class m220511_202513_dish_ingredient_indexes extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex(
            'ingredient-name',
            'ingredient',
            'name'
        );

        $this->createIndex(
            'dish-name',
            'dish',
            'name'
        );

        $this->createIndex(
            'dish_ingredient-dish_id',
            'dish_ingredient',
            'dish_id'
        );

        $this->createIndex(
            'dish_ingredient-ingredient_id',
            'dish_ingredient',
            'ingredient_id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('ingredient-name', 'ingredient');
        $this->dropIndex('dish-name', 'dish');
        $this->dropIndex('dish_ingredient-dish_id', 'dish_ingredient');
        $this->dropIndex('dish_ingredient-ingredient_id', 'dish_ingredient');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220511_202513_dish_ingredient_indexes cannot be reverted.\n";

        return false;
    }
    */
}
