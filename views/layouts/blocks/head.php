<?php
use yii\helpers\Html;

?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <meta name="description" content="<?=Html::encode($this->context->description)?>">
    <meta name="keywords" content="<?=Html::encode($this->context->keywords)?>">
    <title><?= Html::encode($this->context->title) ?></title>
    <?php $this->head() ?>
</head>