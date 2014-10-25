<?php

namespace app\assets;

use yii\web\AssetBundle;

class LoginAsset extends AssetBundle {
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/main.css',
        'css/site.css',
        'http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all',
        'css/global/plugins/font-awesome/css/font-awesome.min.css',
        'css/global/plugins/simple-line-icons/simple-line-icons.min.css',
        'css/global/plugins/uniform/css/uniform.default.css',
        'css/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',

        'css/global/plugins/select2/select2.css',
        'css/admin/pages/css/login-soft.css',

        'css/global/plugins/select2/select2.css',
        'css/global/plugins/select2/select2.css',

        'css/global/css/components.css',
        'css/global/css/plugins.css',
        'css/admin/layout/css/layout.css',
        'css/admin/layout/css/themes/default.css',
        'css/admin/layout/css/custom.css',
    ];
    public $js = [
        "css/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js",
        "css/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js",
        "css/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js",
        "css/global/plugins/jquery.blockui.min.js",
        "css/global/plugins/jquery.cokie.min.js",
        "css/global/plugins/uniform/jquery.uniform.min.js",
        "css/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js",
        "css/global/plugins/jquery-validation/js/jquery.validate.min.js",
        "css/global/plugins/backstretch/jquery.backstretch.min.js",
        "css/global/plugins/select2/select2.min.js",
        "css/global/scripts/metronic.js",
        "css/admin/layout/scripts/layout.js",
        "css/admin/layout/scripts/quick-sidebar.js",
        "css/admin/layout/scripts/demo.js",
        "css/admin/pages/scripts/login-soft.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
