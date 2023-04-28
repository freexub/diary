<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\Classrooms $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Classrooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="classrooms-view">

    <div class="card">
        <div class="card-header d-flex p-0">
            <h3 class="card-title p-3" style="font-size: 25px"><span class="badge bg-success"><?= Html::encode($this->title) ?></span></h3>
            <ul class="nav nav-pills ml-auto p-2">
                <li class="nav-item"><a class="nav-link" href="#tab_1" data-toggle="tab">Паспорт класса</a></li>
                <li class="nav-item"><a class="nav-link active" href="#tab_2" data-toggle="tab">Список учеников</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Список дисциплин</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        Меню <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu" style="">
                        <a class="dropdown-item" tabindex="-1" href="#">Редактировать</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" tabindex="-1" href="#">Удалить</a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane" id="tab_1">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',
                            'name',
                            'year_study',
                            'date_create',
                        ],
                    ]) ?>
                </div>

                <div class="tab-pane active" id="tab_2">
                    <?= GridView::widget([
                        'dataProvider' => $dataStudents,
                        'showHeader' => false,
                        'summary' => false,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'format' => 'raw',
                                'contentOptions' => ['style' => 'width: 5%;'],
                                'value' => function($data){
                                    return '<div class="user-block">
                                            <img src="/photo/'.$data->profiles->getPhoto().'" alt="user-avatar" class="img-circle img-bordered-sm">
                                        </div>';
                                }
                            ],
                            [
                                'format' => 'raw',
                                'contentOptions' => ['style' => 'width: 67%;'],
                                'value' => function($data){
                                    return $data->profiles->fullName;
                                }
                            ],
                            [
                                'format' => 'raw',
                                'label' => 'Успеваемость',
//                                'contentOptions' => ['style' => 'width: 90%;'],
                                'value' => function($data){
                                    $rand = rand(30, 100);
                                    if ($rand < 60)
                                        $color = 'warning';
                                    else
                                        $color = 'success';


                                    return '<span class="badge bg-'.$color.'">'.$rand.'%</span>';
                                }
                            ],
                            [
                                'format' => 'raw',
                                'value' => function($data){
                                    return '<a href="delete-from-class?id='.$data->user_id.'" class="btn btn-danger btn-block">Открепить</a>';
                                }
                            ],
                        ],
                    ]); ?>

                    <hr>
                    <?= GridView::widget([
                        'dataProvider' => $dataProfiles,
                        'filterModel' => $searchProfiles,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'sname',
                            'name',
                            [
                                'format' => 'raw',
                                'value' => function($data){
                                    return '<a href="add-student?user_id='.$data->user_id.'&id='.$_GET["id"].'" class="btn btn-success">Добавить в класс</a>';
                                }
                            ],
                        ],
                    ]); ?>
                </div>
                <div class="tab-pane" id="tab_3">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="btn-group-vertical btn-gro">
                            <?php
                                foreach ($dataDiscipline->models as $item){
                                    $active = '';
                                    if (isset($_GET['did']) && $_GET['did'] == $item->id)
                                        $active = 'active';
                                    echo Html::a($item->name, ['', 'id' => $model->id, 'did' => $item->id], ['class' => 'btn btn-info mb-1 '.$active]);
                                }
                            ?>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <?= $this->render('schedule', [
                                'dataProvider' => $dataSchedule,
                                'modelSchedule' => $modelSchedule,
                                'discipline_class_id' => $discipline_class_id,
                            ]) ?>
                        </div>
                    </div>

                </div>


            </div>

        </div>
    </div>


</div>
