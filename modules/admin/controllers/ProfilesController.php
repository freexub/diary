<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Profiles;
use app\models\ProfilesSearch;
use app\models\Signup;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;

/**
 * ProfilesController implements the CRUD actions for Profiles model.
 */
class ProfilesController extends Controller
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
     * Lists all Profiles models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProfilesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Profiles model.
     * @param int $user_id User ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($user_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($user_id),
        ]);
    }

    /**
     * Creates a new Profiles model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Profiles();
        $signUp = new Signup();

        if ($this->request->isPost) {
            $photoFile = new UploadForm();
            if ($signUp->load(Yii::$app->getRequest()->post())) {
                if ($user = $signUp->signup()) {
                    if ($model->load($this->request->post())) {
                        $path = Yii::$app->basePath . '/web/photo/';
                        $photoFile->file = UploadedFile::getInstance($model, 'photo');

                        if ($photoFile->file && $photoFile->validate()) {
                            $model->photo = $user->id . '_photo' . '.' . $photoFile->file->extension;
                            $photoFile->file->saveAs($path. $model->photo);
                        }
                        $model->user_id = $user->id;
                        if ($model->save())
                            return $this->redirect(['view', 'user_id' => $model->user_id]);
                        else
                            var_dump($model->errors);die();
                    }
                } else {
                    var_dump($signUp->errors);die();
                    $model->loadDefaultValues();
//                    $signUp->loadDefaultValues();
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
            'signUp' => $signUp,
        ]);
    }

    /**
     * Updates an existing Profiles model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $user_id User ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($user_id)
    {
        $model = $this->findModel($user_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'user_id' => $model->user_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Profiles model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $user_id User ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($user_id)
    {
        $this->findModel($user_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Profiles model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $user_id User ID
     * @return Profiles the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($user_id)
    {
        if (($model = Profiles::findOne(['user_id' => $user_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
