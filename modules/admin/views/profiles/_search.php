<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ProfilesSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="profiles-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'sname') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'fname') ?>

    <?= $form->field($model, 'birthday') ?>

    <?php // echo $form->field($model, 'adress') ?>

    <?php // echo $form->field($model, 'type_id') ?>

    <?php // echo $form->field($model, 'iin') ?>

    <?php // echo $form->field($model, 'date_update') ?>

    <?php // echo $form->field($model, 'date_create') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
