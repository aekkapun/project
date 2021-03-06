<?php

use app\components\L;

$this->title = 'Менеджер проектов для фрилансера';

$grafic1 = json_encode($grafic1);


?>
<!-- BEGIN DASHBOARD STATS -->
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat blue-madison">
            <div class="visual">
                <i class="fa fa-comments"></i>
            </div>
            <div class="details">
                <div class="number">
                    1349
                </div>
                <div class="desc">
                    <?=L::t('New comments')?>
                </div>
            </div>
            <a class="more" href="#">
                <?=L::t('View more')?> <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat red-intense">
            <div class="visual">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="details">
                <div class="number">
                    12,5M$
                </div>
                <div class="desc">
                    Total Profit
                </div>
            </div>
            <a class="more" href="#">
                <?=L::t('View more')?> <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat green-haze">
            <div class="visual">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="details">
                <div class="number">
                    <?=$count_proects?>
                </div>
                <div class="desc">
                    <?=L::t('Total projects')?>
                </div>
            </div>
            <a class="more" href="<?=\yii\helpers\Url::toRoute('/projects')?>">
                <?=L::t('View more')?> <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat purple-plum">
            <div class="visual">
                <i class="fa fa-globe"></i>
            </div>
            <div class="details">
                <div class="number">
                    +89%
                </div>
                <div class="desc">
                    Brand Popularity
                </div>
            </div>
            <a class="more" href="#">
                <?=L::t('View more')?> <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
</div>
<!-- END DASHBOARD STATS -->
<div class="clearfix"></div>
<div class="row">
<div class="col-md-6 col-sm-6">
    <!-- BEGIN PORTLET-->
    <div class="portlet solid bordered grey-cararra">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-bar-chart-o"></i><?=L::t('Site Orders')?>
            </div>
        </div>
        <div class="portlet-body">
            <div id="site_statistics_loading">
                <img src="css/admin/layout/img/loading.gif" alt="loading"/>
            </div>
            <div id="site_statistics_content" class="display-none">
                <div id="site_statistics" data-grafic='<?=$grafic1?>' class="chart">
                </div>
            </div>
        </div>
    </div>
    <!-- END PORTLET-->
</div>
<div class="col-md-6 col-sm-6">
    <!-- BEGIN PORTLET-->
    <div class="portlet solid grey-cararra bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-bullhorn"></i>Revenue
            </div>
            <div class="actions">
                <div class="btn-group pull-right">
                    <a href="" class="btn grey-steel btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        Filter <span class="fa fa-angle-down">
									</span>
                    </a>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <a href="javascript:;">
                                Q1 2014 <span class="label label-sm label-default">
											past </span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                Q2 2014 <span class="label label-sm label-default">
											past </span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="javascript:;">
                                Q3 2014 <span class="label label-sm label-success">
											current </span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                Q4 2014 <span class="label label-sm label-warning">
											upcoming </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="portlet-body">
            <div id="site_activities_loading">
                <img src="css/admin/layout/img/loading.gif" alt="loading"/>
            </div>
            <div id="site_activities_content" class="display-none">
                <div id="site_activities" style="height: 228px;">
                </div>
            </div>
            <div style="margin: 20px 0 10px 30px">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
										<span class="label label-sm label-success">
										Revenue: </span>
                        <h3>$13,234</h3>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
										<span class="label label-sm label-info">
										Tax: </span>
                        <h3>$134,900</h3>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
										<span class="label label-sm label-danger">
										Shipment: </span>
                        <h3>$1,134</h3>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
										<span class="label label-sm label-warning">
										Orders: </span>
                        <h3>235090</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END PORTLET-->
</div>
</div>