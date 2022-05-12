<?php

use yii\db\Migration;

/**
 * Class m220512_190729_db_dump_2022_05_12
 */
class m220512_190729_db_dump_2022_05_12 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        \Yii::$app->runAction(
            'dump/create',
            [
                'db' => 'db',
                'gzip' => true,
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220512_190729_db_dump_2022_05_12 cannot be reverted.\n";

        return false;
    }
    */
}
