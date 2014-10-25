<?php

namespace app\controllers;

use Yii;
use app\models\Projects;
use yii\data\ActiveDataProvider;
use app\components\AController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\components\L;

/**
 * ProjectsController implements the CRUD actions for Projects model.
 */
class ProjectsController extends AController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Projects models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Projects::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Projects model.
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
     * Creates a new Projects model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Projects();

        // Получаэмо курс валют
        $file =  simplexml_load_file('https://api.privatbank.ua/p24api/pubinfo?exchange&coursid=3');
        foreach($file->row as $val) {
            if($this->xml_attribute($val->exchangerate->attributes(), 'ccy') == 'USD') {
                $model->kurs = $this->xml_attribute($val->exchangerate->attributes(), 'buy');
            }
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Projects model.
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
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Projects model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionStart($id)
    {
        $model = $this->findModel($id);
        $model->status = 'developing';
        $model->date_pochatoc = date('Y-m-d');
        if(isset($model->days))
            $model->date_kinetc = date('Y-m-d', strtotime($model->date_pochatoc)+3600*24*$model->days);

        if($model->update()){
            Yii::$app->session->setFlash('success', L::t('You started drafting'));
        } else {
            Yii::$app->session->setFlash('danger', L::t('Error started drafting'));
        }
        return $this->redirect(['index']);
    }

    public function actionStop($id)
    {
        $model = $this->findModel($id);
        $model->status = 'done_but_not_paid';
        if($model->update()) {
            Yii::$app->session->setFlash('success', L::t('You have successfully passed the job'));
        } else {
            Yii::$app->session->setFlash('danger', L::t('Error at the time of'));
        }
        return $this->redirect(['index']);
    }
    public function actionPaid($id)
    {
        $model = $this->findModel($id);
        $model->status = 'done';
        if($model->update()) {
            Yii::$app->session->setFlash('success', L::t('You have successfully'));
        } else {
            Yii::$app->session->setFlash('danger', L::t('Update error'));
        }
        return $this->redirect(['index']);
    }
    /**
     * Finds the Projects model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Projects the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Projects::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function xml_attribute($object, $attribute)
    {
        if(isset($object[$attribute]))
            return (string) $object[$attribute];
    }
}
