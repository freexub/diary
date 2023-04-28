<?php

namespace app\modules\admin\controllers;

use app\models\Disciplines;
use app\models\DisciplinesClassroom;
use app\models\DisciplinesClassSchedule;
use Yii;
use app\models\ProfilesSearch;
use app\models\DisciplinesClassroomSearch;
use app\models\ListClassSearch;
use app\models\ListClass;
use app\models\StudentsClassrooms;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\DisciplinesSearch;
use yii\data\ActiveDataProvider;

/**
 * ListClassController implements the CRUD actions for ListClass model.
 */
class ListClassController extends Controller
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
     * Lists all ListClass models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ListClassSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ListClass model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $tab=0)
    {
        $model = $this->findModel($id);
        $searchModel = new DisciplinesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $searchProfiles = new ProfilesSearch();
        $dataProfiles = $searchProfiles->search($this->request->queryParams);
        $dataProfiles->query->andWhere(['type_id'=>2]);
        $dataProfiles->query->andWhere('user_id not in (SELECT user_id FROM students_classrooms WHERE type_id = 2)');

//
//        $searchDiscipline = new DisciplinesSearch();
//        $dataDiscipline = $searchDiscipline->search($this->request->queryParams);
//        $dataDiscipline->query->andWhere('id in (Select disciplines_id FROM disciplines_class_type where class_type_id = '.$model->year_study.')');

        $dataDiscipline = new ActiveDataProvider([
            'query' => Disciplines::find()->where('id in (Select disciplines_id FROM disciplines_class_type where class_type_id = '.$model->year_study.')'),
            'sort' => false
        ]);

        $querySchedule = '';
        $discipline_class_id = 0;
        if (isset($_GET['did'])){
            $discipline_class_id = DisciplinesClassroom::find()->where([
                'disciplines_id' => $_GET['did'],
                'class_type_id' => $model->year_study
            ])->one();
//            var_dump($discipline_class_id->id);die();
            $querySchedule = DisciplinesClassSchedule::find()
                ->where(['disciplines_class_list_id'=>$discipline_class_id->id])
                ->orderBy('day ASC');

        }
        $dataSchedule = new ActiveDataProvider([
            'query' => $querySchedule,
            'sort' => false
        ]);

        $modelSchedule = new DisciplinesClassSchedule();

        $dataStudents = new ActiveDataProvider([
            'query' => StudentsClassrooms::find()->where(['classroom_id'=>$id]),
            'sort' => false
        ]);

        return $this->render('view', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchProfiles' => $searchProfiles,
            'dataProfiles' => $dataProfiles,
            'dataStudents' => $dataStudents,
            'dataDiscipline' => $dataDiscipline,
            'dataSchedule' => $dataSchedule,
            'modelSchedule' => $modelSchedule,
            'discipline_class_id' => $discipline_class_id,
        ]);
    }

    public function actionScheduleAdd(){
        $model = new DisciplinesClassSchedule();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(Yii::$app->request->referrer);
            }
        } else {
            var_dump($model->errors);die();
        }
    }

    public function actionAddStudent($id, $user_id){
        $model = new StudentsClassrooms();
        $model->classroom_id = $id;
        $model->user_id = $user_id;
        if ($model->save())
            return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Creates a new ListClass model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ListClass();

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
     * Updates an existing ListClass model.
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
     * Deletes an existing ListClass model.
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

    public function actionDeleteFromClass($id)
    {
        $model = StudentsClassrooms::findOne($id);
        $model->delete();

        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Finds the ListClass model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return ListClass the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ListClass::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
