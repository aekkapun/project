<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\components\L;

$form = ActiveForm::begin([
    'fieldConfig' => [
        'template' => "{label}\n<div class='col-md-4'>\n{input}\n{hint}\n{error}\n</div>\n",
        'labelOptions' => ['class'=>'control-label col-md-3'],
    ],

    'options' => ['class'=>'form-horizontal']
]);

?>
    <h3 class="page-title">
        <?=L::t('Settings')?>
    </h3>
    <div class="tabbable">
        <ul class="nav nav-tabs nav-tabs-lg">
            <li class="active">
                <a href="#tab_1" data-toggle="tab"><?=L::t('Settings')?></a>
            </li>
            <li>
                <a href="#tab_2" data-toggle="tab"><?=L::t('Config')?></a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                dsa
            </div>
            <div class="tab-pane" id="tab_2">
                <div class="container-fluid">
                    <?=$this->render('config', array('model'=>$model, 'form'=> $form))?>
                </div>
            </div>
        </div>
    </div>
<?php

ActiveForm::end();