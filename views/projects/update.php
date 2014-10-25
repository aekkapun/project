<?php

use yii\helpers\Html;
use app\components\L;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $model app\models\Projects */

$this->title = L::t('Update: {modelClass}','models\projects',['modelClass' => $model->name]);
$this->params['breadcrumbs'][] = ['label' => L::t('Projects', 'models\projects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = L::t('Update', 'models\projects');
?>

<h3 class="page-title">
    <?=$this->title?>
</h3>
<div class="page-bar">
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        'options' => ['class'=>'page-breadcrumb'],
        'itemTemplate' => '<li>{link}<i class="fa fa-angle-right"></i></li>'
    ]) ?>
</div>
<div class="row">
    <div class="col-md-12">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>