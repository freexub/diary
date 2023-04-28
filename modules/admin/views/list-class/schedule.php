<?php

use yii\helpers\Html;
use yii\grid\GridView;

?>
<?php if (isset($_GET['did'])){ ?>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Добавить урок
    </button>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавление урока</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= $this->render('form/schedule_form', [
                        'model' => $modelSchedule,
                        'discipline_class_id' => $discipline_class_id,
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php
if (isset($_GET['did'])){
    echo GridView::widget([
        'dataProvider' => $dataProvider,
    //    'filterModel' => $searchDiscipline,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'classType.discipline.name',
            [
                'label' => 'День занятия',
                'format' => 'raw',
                'contentOptions' => ['style' => 'width: 30%;'],
                'value' => function ($data) {
                    $arr = [
                        '1'=>'Понедельник',
                        '2'=>'Вторник',
                        '3'=>'Среда',
                        '4'=>'Четверг',
                        '5'=>'Пятница',
                        '6'=>'Суббота',
                        '7'=>'Воскресенье'
                    ];
                    return $arr[$data->day];
                }
            ],
            [
                'label' => 'Номер урока',
                'value' => function($data){
                    return $data->lessonList->name;
                }
            ],
        ],
    ]);
}else{
    echo '<div class="alert alert-warning alert-dismissible pt-3">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-warning"></i> Внимание!</h4>
        В данный момент по предмету расписание отсутствует.
        </div>';
}