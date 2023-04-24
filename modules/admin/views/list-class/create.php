<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ListClass $model */

$this->title = 'Добавить класс';
$this->params['breadcrumbs'][] = ['label' => 'Classrooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classrooms-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
