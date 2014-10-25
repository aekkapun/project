<?php

use app\components\L;

?>
<div class="actions btn-set pull-right">
    <button type="button" name="back" class="btn btn-sm default" onclick="window.history.back()">
        <i class="fa fa-angle-left"></i>
        <?=L::t('Back')?>
    </button>
    <button class="btn btn-sm default">
        <i class="fa fa-reply"></i>
        <?=L::t('Reset')?>
    </button>
    <button class="btn btn-sm green">
        <i class="fa fa-check"></i>
        <?=L::t('Save')?>
    </button>
    <button class="btn btn-sm green" name="submit-type" value="continue">
        <i class="fa fa-check-circle"></i>
        <?=L::t('Save &amp; Continue Edit')?>
    </button>
</div>
<p class="clearfix"></p>