<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ClassType $model */

$this->title = 'Редктирование типа класса: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Class Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="class-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
