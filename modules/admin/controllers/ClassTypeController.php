<?php

namespace app\modules\admin\controllers;

use app\models\ListClass;
use app\models\ListClassSearch;
use Yii;
use app\models\ClassType;
use app\models\ClassTypeSearch;
use app\models\DisciplinesClassroom;
use app\models\DisciplinesClassroomSearch;
use app\models\DisciplinesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * ClassTypeController implements the CRUD actions for ClassType model.
 */
class ClassTypeController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all ClassType models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ClassTypeSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ClassType model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $searchDisciplineClassrom = new DisciplinesClassroomSearch();
        $dataDisciplineClassrom = $searchDisciplineClassrom->search($this->request->queryParams);

        $searchDiscipline = new DisciplinesSearch();
        $dataDiscipline = $searchDiscipline->search($this->request->queryParams);
        $dataDiscipline->query->andWhere('id not in (SELECT disciplines_id FROM disciplines_classroom)');

        $searchListClass = new ListClassSearch();
        $dataListClass = $searchListClass->search($this->request->queryParams);
        $dataListClass->query->andWhere(['year_study'=>$id]);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchDiscipline' => $searchDiscipline,
            'dataDiscipline' => $dataDiscipline,
            'searchDisciplineClassrom' => $searchDisciplineClassrom,
            'dataDisciplineClassrom' => $dataDisciplineClassrom,
            'searchListClass' => $searchListClass,
            'dataListClass' => $dataListClass,
        ]);
    }

    public function actionAdd($disciplines_id, $class_type_id){
        $model = new DisciplinesClassroom();
        $model->disciplines_id = $disciplines_id;
        $model->class_type_id = $class_type_id;
        if ($model->save())
            return $this->redirect(Yii::$app->request->referrer);
        else
            var_dump($model->errors);
        die();

    }

    public function actionDel($disciplines_id, $class_type_id){

        $model = DisciplinesClassroom::find()->where([
                'disciplines_id' => $disciplines_id,
                'class_type_id' => $class_type_id
            ])->one();

        if ($model->delete())
            return $this->redirect(Yii::$app->request->referrer);
        else
            var_dump($model->errors);
        die();
    }

    /**
     * Creates a new ClassType model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ClassType();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ClassType model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ClassType model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ClassType model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return ClassType the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ClassType::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
