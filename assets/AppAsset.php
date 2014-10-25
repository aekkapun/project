<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle {
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all",
        "css/global/plugins/font-awesome/css/font-awesome.min.css",
        "css/global/plugins/simple-line-icons/simple-line-icons.min.css",
        "css/global/plugins/uniform/css/uniform.default.css",
        "css/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css",

        "css/global/plugins/gritter/css/jquery.gritter.css",
        "css/global/plugins/bootstrap-datepicker/css/datepicker3.css",
        //"css/global/plugins/fullcalendar/fullcalendar.css",
        //"css/global/plugins/jqvmap/jqvmap/jqvmap.css",

        "css/admin/pages/css/tasks.css",

        "css/global/css/components.css",
        "css/global/css/plugins.css",
        "css/admin/layout/css/layout.css",
        "css/admin/layout/css/themes/default.css",
        "css/admin/layout/css/custom.css",
    ];
    public $js = [
        "css/global/plugins/bootstrap/js/bootstrap.min.js",
        "css/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js",
        "css/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js",
        "css/global/plugins/jquery.blockui.min.js",
        "css/global/plugins/jquery.cokie.min.js",
        "css/global/plugins/uniform/jquery.uniform.min.js",
        "css/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js",

        "css/global/plugins/flot/jquery.flot.min.js",
        "css/global/plugins/flot/jquery.flot.resize.min.js",
        "css/global/plugins/flot/jquery.flot.categories.min.js",
        "css/global/plugins/jquery.pulsate.min.js",
        "css/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js",
        "css/global/plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.ua.js",

        //"css/global/plugins/fullcalendar/fullcalendar.min.js",
        "css/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js",
        "css/global/plugins/jquery.sparkline.min.js",
        
        "css/global/scripts/metronic.js",
        "css/admin/layout/scripts/layout.js",
        "css/admin/layout/scripts/quick-sidebar.js",
        "css/admin/layout/scripts/demo.js",
        "css/admin/pages/scripts/tasks.js",
        "css/admin/pages/scripts/components-pickers.js",
        //"css/admin/pages/scripts/form-validation.js",
        "js/grafics.js",
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\jui\JuiAsset',
    ];
}