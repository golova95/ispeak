<?php

namespace app\controllers;

use app\models\AdminUser;
use app\models\Groups;
use app\models\LoginForm;
use app\models\Products;
use app\models\Responsible;
use Yii;
use app\models\Students;
use app\models\StudentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * StudentsController implements the CRUD actions for Students model.
 */
class StudentsController extends Controller
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
     * Lists all Students models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StudentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Students model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionDogovor($id)
    {
        return $this->render('dogovor', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Students model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Students();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $user = new AdminUser();
            $user ->username = strtolower($this->rus2translit(explode(' ', Yii::$app->request->post('Students')['name'])[0]));
            $user ->password = 'ispeak'.$model->id;
            $user ->email = $model->email;
            $user ->active = 0;
            $user ->user_type = 1;
            $user ->authKey = (string)rand(1000, 150000);
            $user ->user_id = $model->id;
            $user ->save();

            $string = md5($user->username.$user->password.time());
            $email = new LoginForm();
            if ($email->contact($model->email, $string, $user ->username)) {

                return $this->redirect(['view', 'id' => $model->id]);

            }

        } else {

            return $this->render('create', [
                'model' => $model,
                'groups' => $this->getGroups(),
                'responsible' => $this->getResp(),
                'products' => $this -> getProd(),
            ]);
        }
    }

    /**
     * Updates an existing Students model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'groups' => $this->getGroups(),
                'responsible' => $this->getResp(),
                'products' => $this -> getProd(),
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Students model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {

        $user = AdminUser::findOne(['user_id' => $id]);
        if ($user) {
            $user->delete();
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Students model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Students the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Students::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function countFreePlaces($id)
    {
        return Students::find()
            ->where(['group_id' => $id])
            ->count();
    }

    public function getGroups(){

        $today = date("Y-m-d");
        $groups = Groups::find()
            ->where("last>$today")
            ->all();


        foreach ($groups as $key=>$group) {

            $freeplaces = $group->attributes['places']-$this->countFreePlaces($group->attributes['id']);

            if($freeplaces < 1){
                unset($groups[$key]);
            };
        }

        $groups = ArrayHelper::map($groups, 'id', 'name');

        return $groups;

    }

    public function getResp(){

        $resp = Responsible::find()
            ->all();

        $resp = ArrayHelper::map($resp, 'id', 'name');

        return $resp;

    }

    public function getProd(){

        $prod = Products::find()
            ->all();

        $prod = ArrayHelper::map($prod, 'id', 'name');

        return $prod;

    }

    public function rus2translit($string) {
        $converter = array(
            'а' => 'a',   'б' => 'b',   'в' => 'v',
            'г' => 'g',   'д' => 'd',   'е' => 'e',
            'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
            'и' => 'i',   'й' => 'y',   'к' => 'k',
            'л' => 'l',   'м' => 'm',   'н' => 'n',
            'о' => 'o',   'п' => 'p',   'р' => 'r',
            'с' => 's',   'т' => 't',   'у' => 'u',
            'ф' => 'f',   'х' => 'h',   'ц' => 'c',
            'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
            'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
            'э' => 'e',   'ю' => 'yu',  'я' => 'ya',

            'А' => 'A',   'Б' => 'B',   'В' => 'V',
            'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
            'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
            'И' => 'I',   'Й' => 'Y',   'К' => 'K',
            'Л' => 'L',   'М' => 'M',   'Н' => 'N',
            'О' => 'O',   'П' => 'P',   'Р' => 'R',
            'С' => 'S',   'Т' => 'T',   'У' => 'U',
            'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
            'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
            'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
            'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
        );
        return strtr($string, $converter);
    }
}
