<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="projects-form">
    <?php $form = ActiveForm::begin([
        'fieldConfig' => [
            'template' => "{label}\n<div class='col-md-4'>\n{input}\n{hint}\n{error}\n</div>\n",
            'labelOptions' => ['class'=>'control-label col-md-3'],
        ],

        'options' => ['class'=>'form-horizontal']
    ]); ?>

    <?=$this->render('@app/views/layouts/blocks/buttons-edit')?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 250]) ?>
    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'price')->textInput() ?>
    <?= $form->field($model, 'kurs')->textInput(['disabled'=>'disabled']) ?>

    <?php if(!$model->isNewRecord):?>

    <?= $form->field($model, 'date_pochatoc', [
            'template' => "{label}\n<div class='col-md-4 col-xs-10'><div class=\"input-group date date-picker\" data-date-format=\"yyyy-mm-dd\">{input}<span class=\"input-group-btn\"><button class=\"btn btn-md default\" type=\"button\"><i class=\"fa fa-calendar\"></i></button></span></div>\n{hint}\n{error}</div>",
            'labelOptions' => ['class'=>'control-label col-md-3'],
        ])->textInput(['class'=>'form-control form-filter']) ?>

    <?= $form->field($model, 'date_kinetc', [
            'template' => "{label}\n<div class='col-md-4 col-xs-10'><div class=\"input-group date date-picker\" data-date-format=\"yyyy-mm-dd\">{input}<span class=\"input-group-btn\"><button class=\"btn btn-md default\" type=\"button\"><i class=\"fa fa-calendar\"></i></button></span></div>\n{hint}\n{error}</div>",
            'labelOptions' => ['class'=>'control-label col-md-3'],
        ])->textInput(['class'=>'form-control form-filter']) ?>

    <?php endif;?>
    <?= $form->field($model, 'days')->textInput() ?>
    <?= $form->field($model, 'valuta')->dropDownList(\app\models\Projects::allCurrencies()) ?>
    <?= $form->field($model, 'status')->dropDownList(\app\models\Projects::allStatus()) ?>
    <?= $form->field($model, 'link_site')->textInput(['maxlength' => 500]) ?>
    <?= $form->field($model, 'paid', [
        'template'=>"<div class='control-label col-md-3'></div> {label}\n<div class='col-md-4'>\n{input}\n{hint}\n{error}\n</div>\n"
    ])->checkbox() ?>

    <?=$this->render('@app/views/layouts/blocks/buttons-edit')?>

    <?php ActiveForm::end(); ?>
</div>
