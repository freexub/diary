<?php

use yii\helpers\Html;
use yii\grid\GridView;

?>

<?php
GridView::widget([
    'dataProvider' => $dataDiscipline,
    'filterModel' => $searchDiscipline,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'name',
        [
            'format' => 'raw',
            'contentOptions' => ['style' => 'width: 5%;'],
            'value' => function ($data) {
                return '<a href="add-student?user_id=' . $data->id . '&id=' . $_GET["id"] . '" class="btn btn-success btn-block">Расписание</a>';
            }
        ],
    ],
]);