<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use BomCMS\AdminLTE\ActiveForm;

$this->title = 'Đăng nhập';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-box">
    <div class="login-logo">
        <?= Html::a(Html::img('/img/logo.png', ['class' => 'img-responsive center-block','width' => '200']), ['site/index']); ?>
    </div>
    <div class="login-box-body">
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
        <div class="form-group has-feedback">
            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
            <!--                    <span class="glyphicon glyphicon-user form-control-feedback"></span>-->
        </div>
        <div class="form-group has-feedback">
            <?= $form->field($model, 'password')->passwordInput() ?>
            <!--                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>-->
        </div>
        <div class="row">
            <div class="col-xs-7">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
            </div>
            <div class="col-xs-5">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary form-control', 'name' => 'login-button']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

