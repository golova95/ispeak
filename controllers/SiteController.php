<?php

namespace app\controllers;

use app\models\AdminUser;
use app\models\Recover;
use app\models\RecoverForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Students;
use yii\web\NotFoundHttpException;
use yii\helpers\ArrayHelper;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */




    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->identity['user_id'] == 1) {

            return $this->render('index', [
                'model' => Yii::$app->user->identity['user_id']
            ]);
        }else{
            return $this->redirect('profile');
        }
    }



    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if (!isset(Yii::$app->request->post('LoginForm')['email'])) {
            if ($model->load(Yii::$app->request->post()) && $model->login()) {
                if (Yii::$app->user->identity['user_id'] == 1) {
                    return $this->redirect('index');
                } else {
                    return $this->redirect('profile');
                }
            }
        }
        elseif (Yii::$app->request->post('LoginForm')['email']){
            if ($model->load(Yii::$app->request->post()))
            {
                if ($model->restore()) {
                    return $this->redirect('confirm');
                }
            }
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionProfile()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('login');
        }
        $id = Yii::$app->user->identity['user_id'];
        return $this->render('profile', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionTest()
    {
        return $this->render('test', []);
    }

    public function actionConfirm()
    {
        return $this->render('confirm');
    }

    public function actionRecover()
    {

        $model = new RecoverForm();
        $hash =Yii::$app->request->get('hash');
        if ($hash) {
            $user = $model->GetRecoverUser($hash);
            if ($user) {

                if (strtotime($user->expires) > time()) {

                    if (Yii::$app->request->post('RecoverForm')) {

                        $data = Yii::$app->request->post('RecoverForm');
                        if ($data['ps1'] === $data['ps2']) {

                            $model -> Recover($user->user_id, $data['ps1']);
                            return $this->redirect('login');
                        } else {
                            $model->ValidatePassword($data['ps2']);
                        }
                    } else {

                        return $this->render('recover', [
                            'model' => $model,
                            'hash' => $hash,
                        ]);

                    }
                } else {
                    throw new NotFoundHttpException('The requested page does not exist.');
                }
            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    protected function findModel($id)
    {
        if (($model = Students::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
