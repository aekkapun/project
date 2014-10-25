<?php

use yii\helpers\Html;
use app\components\L;


/* @var $this yii\web\View */
/* @var $model app\models\Projects */

$this->title = L::t('Create {modelClass}', 'system', [
    'modelClass' => L::t('Project'),
]);
$this->params['breadcrumbs'][] = ['label' => L::t('Projects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projects-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
