<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Thêm mới nhân viên';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success site-signup">
    <div class="box-body">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
        <?= $form->field($model, 'full_name')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'phone_number') ?>

        <?= $form->field($model, 'email') ?>

        <?= $form->field($model, 'username')->textInput() ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'password_confirm')->passwordInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Thêm mới', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
