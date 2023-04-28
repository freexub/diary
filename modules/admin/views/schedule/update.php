<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\DisciplinesClassSchedule $model */

$this->title = 'Update Disciplines Class Schedule: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Disciplines Class Schedules', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="disciplines-class-schedule-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
