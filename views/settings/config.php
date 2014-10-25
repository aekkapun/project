<?php
use yii\helpers\Html;

foreach ($model->attributeNames() as $attribute) {
    echo Html::beginTag('div', array('class' => 'row'));
    {
        echo $form->field($model, $attribute)->textInput();
    }
    echo Html::endTag('div');
}