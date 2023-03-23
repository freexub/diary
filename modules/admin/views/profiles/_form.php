<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Profiles $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="profiles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'sname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birthday')->textInput() ?>

    <?= $form->field($model, 'adress')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'type_id')->textInput() ?>

    <?= $form->field($model, 'iin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_update')->textInput() ?>

    <?= $form->field($model, 'date_create')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
