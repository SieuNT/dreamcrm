<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Cập nhật mật khẩu';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success site-signup">
    <div class="box-body">
        <h1>Thông tin cá nhân</h1>
        <table class="table table-striped">
            <tr>
                <td><strong>Họ và tên</strong></td>
                <td><?= $user->full_name; ?></td>
            </tr>
            <tr>
                <td><strong>Số điện thoại</strong></td>
                <td><?= $user->phone_number; ?></td>
            </tr>
            <tr>
                <td><strong>Email</strong></td>
                <td><?= $user->email; ?></td>
            </tr>
            <tr>
                <td><strong>Tài khoản</strong></td>
                <td><?= $user->username; ?></td>
            </tr>
        </table>
        <h2><?= Html::encode($this->title) ?></h2>
        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'password_confirm')->passwordInput() ?>
        <div class="form-group">
            <?= Html::submitButton('Thay đổi mật khẩu', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
