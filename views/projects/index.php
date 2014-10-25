<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use app\components\L;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('models/projects', 'Projects');
$this->params['breadcrumbs'][] = L::t($this->title);
?>
<h3 class="page-title">
    <?= L::t(Html::encode($this->title)) ?>
</h3>
<div class="page-bar">
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        'options' => ['class'=>'page-breadcrumb'],
        'itemTemplate' => '<li>{link}<i class="fa fa-angle-right"></i></li>'
    ]) ?>
    <div class="page-toolbar">
        <div class="btn-group pull-right">
            <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
                Actions <i class="fa fa-angle-down"></i>
            </button>
            <ul class="dropdown-menu pull-right" role="menu">
                <li>
                    <a href="#">Action</a>
                </li>
                <li>
                    <a href="#">Another action</a>
                </li>
                <li>
                    <a href="#">Something else here</a>
                </li>
                <li class="divider">
                </li>
                <li>
                    <a href="#">Separated link</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="projects-index">
            <p>
                <?= Html::a(Yii::t('models/projects', 'Create {modelClass}', [
                    'modelClass' => L::t('Project', 'models/projects'),
                ]), ['create'], ['class' => 'btn btn-success']) ?>
            </p>
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-shopping-cart"></i> <?=L::t('List of projects')?>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'tableOptions' => ['class'=>'table table-striped table-bordered table-advance table-hover'],
                            'layout' => "{items}\n{pager}\n{summary}",
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                [
                                    'attribute' => 'name',
                                    'format' => 'html',
                                    'value' => function ($model, $index, $widget) {
                                        return Html::a($model->name, Url::toRoute(['/projects/update', 'id' => $model->id]));
                                    },
                                ],
                                [
                                    'attribute' => 'description',
                                    'format' => 'ntext',
                                    //'headerOptions' => ['style'=>'width:270px'],
                                ],
                                [
                                    'attribute' => 'price',
                                    'format' => 'text',
                                    'value' => function ($model, $index, $widget) {
                                        switch ($model->valuta) {
                                            case 'dol':
                                                return $model->price.'$';
                                                break;
                                            case 'uah':
                                                return $model->price.'₴';
                                                break;
                                            case 'rub':
                                                return $model->price.'р.';
                                                break;
                                        }
                                    },
                                ],
                                'kurs',
                                'date_pochatoc',
                                'date_kinetc',
                                //'days',
                                [
                                    'attribute' => 'status',
                                    'format' => 'html',
                                    'value' => function ($model, $index, $widget) {
                                        return strtr($model->status, \app\models\Projects::allStatus());
                                    },
                                ],
                                [
                                    'attribute' => 'valuta',
                                    'format' => 'html',
                                    'value' => function ($model, $index, $widget) {
                                        return L::t($model->valuta, 'models\projects');
                                    },
                                ],

                                [
                                    'class' => 'yii\grid\ActionColumn',
                                    'template' => '{update}{view}{delete}',
                                    'headerOptions' => ['style'=>'width:110px'],
                                    'buttons' => [
                                        'update' => function ($url, $model, $key) {
                                                if($model->status == 'reviewed') {
                                                    return Html::a('<i class="fa fa-play"></i>', Url::toRoute(['/projects/start', 'id'=>$key]), [
                                                        'class'=>'tooltips btn default btn-xs green-stripe',
                                                        'title'=>L::t('Start development', 'models\projects')
                                                    ]);
                                                } elseif ($model->status == 'developing') {
                                                    return Html::a('<i class="fa fa-paper-plane-o"></i>', Url::toRoute(['/projects/stop', 'id'=>$key]), [
                                                        'class'=>'tooltips btn default btn-xs green-stripe',
                                                        'title' => L::t('Rent work', 'models\projects')
                                                    ]);
                                                } elseif($model->status == 'done_but_not_paid') {
                                                    return Html::a('<i class="fa fa-cc-visa"></i>', Url::toRoute(['/projects/paid', 'id'=>$key]), [
                                                        'class'=>'tooltips btn default btn-xs green-stripe',
                                                        'title' => L::t('Money will provide a', 'models\projects')
                                                    ]);
                                                } else {
                                                    return false;
                                                }
                                        },
                                        'view' => function ($url, $model, $key) {
                                            return Html::a('<i class="fa fa-search"></i>', $url, ['class'=>'btn default btn-xs blue-stripe']);
                                        },
                                        'delete' => function ($url, $model, $key) {
                                            return Html::a(' <i class="fa fa-trash-o"></i> ', $url, [
                                                'class'=>'btn default btn-xs red-stripe',
                                            ]);
                                        }
                                    ]
                                ],

                            ],
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>