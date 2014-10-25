<?php
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);

$this->beginPage();

echo $this->render('@app/views/layouts/blocks/head');

?>
<body class="page-header-fixed page-quick-sidebar-over-content">
    <?php $this->beginBody() ?>
    <?=$this->render('@app/views/layouts/blocks/header')?>
    <div class="page-container">
        <?=$this->render('@app/views/layouts/blocks/sidebar')?>
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <?= $content ?>
            </div>
        </div>
        <!-- END CONTENT -->
    </div>
    <?= $this->render('@app/views/layouts/blocks/footer')?>

    <?php $this->endBody() ?>
    <script>
        jQuery(document).ready(function() {
            Metronic.init(); // init metronic core components
            Layout.init(); // init current layout
            QuickSidebar.init(); // init quick sidebar
            Demo.init(); // init demo features
            ComponentsPickers.init();
        });
    </script>
</body>
</html>
<?php $this->endPage() ?>
