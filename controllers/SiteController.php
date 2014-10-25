<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\components\AController;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Projects;

class SiteController extends AController {

    public function behaviors() {
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

    public function actionIndex()
    {
        $arr = Projects::find()->orderBy('date_pochatoc')->all();
        $grafic = [];
        foreach($arr as $result){
            $date = $result->date_pochatoc;
            $date = date_create($date);
            $year = date_format($date,'Y');
            $m    = date_format($date,'m');

            if(!isset($grafic[$m.'.'.$year])) $grafic[$m.'.'.$year] = '';

            if($m == 1)      $grafic[$m.'.'.$year]++;
            elseif($m == 2)  $grafic[$m.'.'.$year]++;
            elseif($m == 3)  $grafic[$m.'.'.$year]++;
            elseif($m == 4)  $grafic[$m.'.'.$year]++;
            elseif($m == 5)  $grafic[$m.'.'.$year]++;
            elseif($m == 6)  $grafic[$m.'.'.$year]++;
            elseif($m == 7)  $grafic[$m.'.'.$year]++;
            elseif($m == 8)  $grafic[$m.'.'.$year]++;
            elseif($m == 9)  $grafic[$m.'.'.$year]++;
            elseif($m == 10) $grafic[$m.'.'.$year]++;
            elseif($m == 11) $grafic[$m.'.'.$year]++;
            elseif($m == 12) $grafic[$m.'.'.$year]++;
        }
        $grafic1 = [];
        foreach($grafic as $k=>$item) {
            $grafic1[] = [$k,$item];
        }
        print_r($grafic1);
        if (\Yii::$app->user->isGuest) {
            return $this->redirect(array('site/login'));
        } else {
            return $this->render('index', [
                'grafic1'=>$grafic1,
                'count_proects' => count($arr),
            ]);
        }

    }

    public function actionLogin() {
        $this->layout = 'login';

        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    protected function getYearZakaz($arr) {

    }
}