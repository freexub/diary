<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\DisciplinesClassroom $model */

$this->title = 'Create Disciplines Classroom';
$this->params['breadcrumbs'][] = ['label' => 'Disciplines Classrooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="disciplines-classroom-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
