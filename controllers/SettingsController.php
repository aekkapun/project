<?php

namespace app\controllers;

use app\models\ConfigForm;

class SettingsController extends \app\components\AController
{
    public function actionIndex()
    {
        $path = \Yii::getAlias('@app/config') . '/params.php';
        $model = new ConfigForm(require($path));
        if (isset($_POST['ConfigForm'])) {
            $model->setAttributes($_POST['ConfigForm']);
            if($model->save($path))
            {
                \Yii::$app->getSession()->setFlash('success config', 'Конфигурация сохранена');
                $this->refresh();
            }
        }

        return $this->render('index', compact('model'));
    }

}
