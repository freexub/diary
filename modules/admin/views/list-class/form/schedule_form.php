<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\DisciplinesClassSchedule $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="disciplines-class-schedule-form">

    <?php $form = ActiveForm::begin([
            'action' => 'schedule-add'
    ]); ?>

    <?= $form->field($model, 'day')->dropDownList([
            '1'=>'Понедельник',
            '2'=>'Вторник',
            '3'=>'Среда',
            '4'=>'Четверг',
            '5'=>'Пятница',
            '6'=>'Суббота',
            '7'=>'Воскресенье'
    ]) ?>

    <?= $form->field($model, 'disciplines_class_list_id')->hiddenInput(['value'=>$discipline_class_id->id])->label(false) ?>

    <?= $form->field($model, 'lesson_list_id')->dropDownList(ArrayHelper::map($model->getAllLessons(),'id','name')) ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
