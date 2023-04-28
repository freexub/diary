<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\DisciplinesClassSchedule $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="disciplines-class-schedule-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'disciplines_class_list_id')->dropDownList(ArrayHelper::map($model->getAllClasses(),'id','name'),['prompt'=>'Выбрать класс ...']) ?>

    <?= $form->field($model, 'lesson_list_id')->textInput(['type'=>'number']) ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
