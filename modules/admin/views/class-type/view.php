<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ClassType $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Class Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="class-type-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>


    <div class="card">
        <div class="card-header d-flex p-0">
            <h3 class="card-title p-3" style="font-size: 25px"><span class="badge bg-success"><?= Html::encode($this->title) ?></span></h3>
            <ul class="nav nav-pills ml-auto p-2">
                <li class="nav-item"><a class="nav-link" href="#tab_1" data-toggle="tab">Паспорт</a></li>
                <li class="nav-item"><a class="nav-link active" href="#tab_2" data-toggle="tab">Список дисциплин</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Список классов</a></li>
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
                            'about:ntext',
                            'active',
                        ],
                    ]) ?>
                </div>

                <div class="tab-pane active" id="tab_2">
                    <?= GridView::widget([
                        'dataProvider' => $dataDisciplineClassrom,
                        'filterModel' => $searchDisciplineClassrom,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'contentOptions' => ['style' => 'width: 90%;'],
                                'value' => function($data){
                                    return $data->discipline->name;
                                }
                            ],
                            [
//                                'contentOptions' => ['style' => 'width: 10%;'],
                                'format' => 'raw',
                                'value' => function($data){
                                    return Html::a('Удалить', ['del', 'disciplines_id' => $data->disciplines_id, 'class_type_id' => $_GET['id']], [ 'class' => 'btn btn-danger']);
                                }
                            ],
                        ],
                    ]); ?>

                    <hr>

                    <?= GridView::widget([
                        'dataProvider' => $dataDiscipline,
                        'filterModel' => $searchDiscipline,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'contentOptions' => ['style' => 'width: 90%;'],
                                'value' => function($data){
                                    return $data->name;
                                }
                            ],
                            [
//                                'contentOptions' => ['style' => 'width: 10%;'],
                                'format' => 'raw',
                                'value' => function($data){

                                    return Html::a('Добавить', ['add', 'disciplines_id' => $data->id, 'class_type_id' => $_GET['id']], [ 'class' => 'btn btn-success']);

//                                    return '<a href="add-student?user_id='.$data->id.'&id='.$_GET["id"].'" class="btn btn-success">Добавить</a>';
                                }
                            ],
                        ],
                    ]); ?>
                </div>
                <div class="tab-pane" id="tab_3">


                    <?= GridView::widget([
                        'dataProvider' => $dataListClass,
                        'filterModel' => $searchListClass,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'contentOptions' => ['style' => 'width: 90%;'],
                                'value' => function($data){
                                    return $data->name;
                                }
                            ],
                            [
//                                'contentOptions' => ['style' => 'width: 10%;'],
                                'format' => 'raw',
                                'value' => function($data){

                                    return Html::a('Открыть', ['list-class/view', 'id' => $data->id], [ 'class' => 'btn btn-info']);

//                                    return '<a href="add-student?user_id='.$data->id.'&id='.$_GET["id"].'" class="btn btn-success">Добавить</a>';
                                }
                            ],
                        ],
                    ]); ?>
                </div>


            </div>

        </div>
    </div>

</div>
