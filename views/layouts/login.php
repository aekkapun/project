<?php
/**
 * Created by PhpStorm.
 * User: Володимир
 * Date: 20.10.14
 * Time: 16:11
 */
use app\assets\LoginAsset;

LoginAsset::register($this);
$this->beginPage() ?>
<?= $this->render('@app/views/layouts/blocks/head') ?>
    <body class="login">
    <?php $this->beginBody() ?>
    <div class="logo">
        <a href="<?=\yii\helpers\Url::toRoute('site/login')?>">
            <?=\yii\helpers\Html::img('@web/img/logo.png', ['class'=>'logo-default','alt'=>Yii::$app->ss->get('default-title')])?>
        </a>
    </div>
    <div class="menu-toggler sidebar-toggler"></div>

    <div class="content">
        <?= $content ?>
    </div>
    <div class="copyright">
        2014 &copy; <?= Yii::$app->ss->get('default-title') ?>.
    </div>

    <?php $this->endBody() ?>
    <!--[if lt IE 9]>
    <script src="css/global/plugins/respond.min.js"></script>
    <script src="css/global/plugins/excanvas.min.js"></script>
    <![endif]-->
    <script>
        jQuery(document).ready(function () {
            Metronic.init(); // init metronic core components
            Layout.init(); // init current layout
            QuickSidebar.init(); // init quick sidebar
            Demo.init(); // init demo features
            Login.init();
            // init background slide images
            $.backstretch([
                "css/admin/pages/media/bg/1.jpg",
                "css/admin/pages/media/bg/2.jpg",
                "css/admin/pages/media/bg/3.jpg",
                "css/admin/pages/media/bg/4.jpg"
            ], {
                    fade: 1000,
                    duration: 8000
                }
            );
        });
    </script>
    </body>
    </html>
<?php $this->endPage() ?>