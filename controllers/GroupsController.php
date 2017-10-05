<?php

namespace app\controllers;

use app\models\StudentsSearch;
use app\models\Teachers;
use Yii;
use app\models\Groups;
use app\models\Students;
use app\models\GroupsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * GroupsController implements the CRUD actions for Groups model.
 */
class GroupsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Groups models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GroupsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Groups model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $searchModel = new StudentsSearch();
        $dataProvider = $searchModel->getStudents(['group_id' => $id], Yii::$app->request->queryParams);
        $users = Students::find()
            ->where(['group_id' => $id])
            ->all();

        return $this->render('view', [
            'model' => $this->findModel($id, 1),
            'users' => $users,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Groups model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $teachers = Teachers::find()
            ->all();

        $teachers = ArrayHelper::map($teachers, 'id', 'name');


        $model = new Groups();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'teachers' => $teachers,
            ]);
        }
    }

    /**
     * Updates an existing Groups model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $teachers = Teachers::find()
            ->all();

        $teachers = ArrayHelper::map($teachers, 'id', 'name');

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'teachers' => $teachers,
            ]);
        }
    }

    /**
     * Deletes an existing Groups model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Groups model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Groups the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $view=0)
    {
        if (($model = Groups::findOne($id)) !== null) {
            if ($view !=0) {
                $users = Students::find()
                    ->where(['group_id' => $id])
                    ->count();
                $places = $model->places - $users;
                if ($places <= -3) {
                    $model->places = "Группа заполнена";
                }else {
                    $model->places = "$places/" . $model->places;
                }


            }
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
