<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dishes Search Result';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dish-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Dish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php if ($dishes): ?>

    <?php foreach ($dishes as $dish): ?>
        <div>
            <div><?= $dish->id ?></div>
            <div><?= $dish->name ?></div>
        </div>
    <?php endforeach; ?>

    <?php else: ?>

        <div>Ничего не найдено</div>

    <?php endif ?>

</div>
