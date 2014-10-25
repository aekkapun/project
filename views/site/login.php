<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \app\components\L;

$this->context->title = 'Авторизація';
?>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'login-form'],
        'fieldConfig' => [
            'labelOptions' => ['class' => 'control-label visible-ie8 visible-ie9'],
        ],
    ]); ?>
    <h3 class="form-title"><?= Html::encode($this->title) ?></h3>

    <?=
    $form->field($model, 'username', [
        'template' => "{label}\n<div class=\"input-icon\"><i class='fa fa-user'></i>{input}</div>\n{hint}\n{error}"
    ])->textInput(array('placeholder' => L::t('Username'), 'class' => 'form-control placeholder-no-fix'));  ?>

    <?=
    $form->field($model, 'password', [
        'template' => "{label}\n<div class=\"input-icon\"><i class='fa fa-lock'></i>{input}\n{hint}\n{error}"
    ])->passwordInput(array('placeholder' => L::t('Password'), 'class' => 'form-control placeholder-no-fix'));  ?>




    <div class="form-actions">
        <?=
        $form->field($model, 'rememberMe', [
            'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ])->checkbox() ?>

        <?= Html::submitButton(L::t('Login').'<i class="m-icon-swapright m-icon-white"></i>', ['class' => 'btn blue pull-right', 'name' => 'login-button']) ?>
    </div>
<?php ActiveForm::end(); ?>