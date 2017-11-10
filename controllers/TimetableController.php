<?php

namespace app\controllers;

use Yii;
use app\models\Timetable;
use app\models\TimetableSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TimetableController implements the CRUD actions for Timetable model.
 */
class TimetableController extends Controller
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
     * Lists all Timetable models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TimetableSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Timetable model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Timetable model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Timetable();

        if(Yii::$app->request->post()){
            if (Yii::$app->request->post('time') && (Yii::$app->request->post('ПН') || Yii::$app->request->post('ВТ') || Yii::$app->request->post('СР') || Yii::$app->request->post('ЧТ') || Yii::$app->request->post('ПТ'))) {

                $post = Yii::$app->request->post();
                $days ='';


                foreach ($post as $key=>$value){
                    if ($value === '1')
                    {
                        $days.=$key.',';
                    }
                }
                $days = substr($days, 0, -1);



                $model -> time = Yii::$app->request->post('time');
                $model -> days = $days;

                if ($model->save()){
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }else{
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Timetable model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);



        if(Yii::$app->request->post()){
            if (Yii::$app->request->post('time') && (Yii::$app->request->post('ПН') || Yii::$app->request->post('ВТ') || Yii::$app->request->post('СР') || Yii::$app->request->post('ЧТ') || Yii::$app->request->post('ПТ'))) {

                $post = Yii::$app->request->post();
                $days ='';


                foreach ($post as $key=>$value){
                    if ($value === '1')
                    {
                        $days.=$key.',';
                    }
                }
                $days = substr($days, 0, -1);



                $model -> time = Yii::$app->request->post('time');
                $model -> days = $days;

                if ($model->save()){
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }else{
                return $this->render('update', [
                    'model' => $model,
                    'time' => Yii::$app->request->post('time'),
                ]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        } else {
//            return $this->render('update', [
//                'model' => $model,
//            ]);
//        }
    }

    /**
     * Deletes an existing Timetable model.
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
     * Finds the Timetable model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Timetable the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Timetable::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
