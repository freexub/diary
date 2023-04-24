<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ClassType $model */

$this->title = 'Типы классов';
$this->params['breadcrumbs'][] = ['label' => 'Class Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="class-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
