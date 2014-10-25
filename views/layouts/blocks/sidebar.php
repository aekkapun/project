<?php
use yii\helpers\Url;
?>
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="sidebar-toggler-wrapper">
                <div class="sidebar-toggler"></div>
            </li>
            <li style="padding: 5px"> </li>
            <li class="start <?=$this->context->active(Url::toRoute('/'), 'active')?>">
                <a href="<?=Url::toRoute('/')?>">
                    <i class="icon-home"></i>
                    <span class="title"><?=\app\components\L::t('Home')?></span>
                    <?=$this->context->active(Url::toRoute('/'), '<span class="selected"></span>')?>
                </a>
            </li>
            <li class="start <?=$this->context->active(Url::toRoute('/projects'), 'active')?>">
                <a href="<?=Url::toRoute('/projects')?>">
                    <i class="icon-rocket"></i>
                    <span class="title"><?=\app\components\L::t('Projects')?></span>
                    <?=$this->context->active(Url::toRoute('/projects'), '<span class="selected"></span>')?>
                </a>
                <?php /*<ul class="sub-menu">
                    <li class="<?=$this->context->active(Url::toRoute('/projects'), 'active')?>">
                        <a href="<?=Url::toRoute('/projects/create')?>">
                            <i class="icon-plus"></i> <?=\Yii::t('models/projects', 'Create {modelClass}', [
                                'modelClass' => \app\components\L::t('Project', 'models/projects'),
                            ])?>
                        </a>
                    </li>
                </ul>*/?>
            </li>
            <li class="start <?=$this->context->active(Url::toRoute('/settings'), 'active')?>">
                <a href="<?=Url::toRoute('/settings')?>">
                    <i class="icon-settings"></i>
                    <span class="title"><?=\app\components\L::t('Settings')?></span>
                    <?=$this->context->active(Url::toRoute('/settings'), '<span class="selected"></span>')?>
                </a>
            </li>
        </ul>
    </div>
</div>