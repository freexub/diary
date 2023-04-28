<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\DisciplinesClassSchedule $model */

$this->title = 'Добавление расписания';
$this->params['breadcrumbs'][] = ['label' => 'Disciplines Class Schedules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="disciplines-class-schedule-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
