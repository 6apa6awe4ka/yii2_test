<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dish".
 *
 * @property int $id
 * @property string $name
 *
 * @property Ingredient[] $ingredients
 */
class Dish extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dish';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for Ingredient[].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIngredients()
    {
        return $this->hasMany(Ingredient::className(), ['id' => 'ingredient_id'])->viaTable('dish_ingredient', ['dish_id' => 'id']);
    }

    /**
     * @param int[] $ingredientIds IDS
     * @return \yii\db\ActiveQuery
     */
    public static function searchQuery($ingredientIds)
    {
        $subQuery = DishIngredient::find()
            ->select(['dish_id', 'COUNT(*) as cnt'])
            ->groupBy('dish_id')
            ->orderBy(['cnt' => SORT_DESC])
            ->having(['>', 'COUNT(*)', 1])
            ->where(['in', 'ingredient_id', $ingredientIds])
        ;

        $query = (new \yii\db\Query())
            ->select(['dish.id', 'dish.name'])
            ->from($subQuery)
            ->leftJoin('dish', 'dish.id = dish_id')
            ->orderBy(['cnt' => SORT_DESC])
        ;
        
        return $query;
    }
}
