<?php

use app\models\CustomerResource;
use app\models\Partner;
use app\models\Project;
use app\models\User;
use kartik\daterange\DateRangePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-success customer-form">
    <div class="box-body">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'user_id')->dropDownList(
            ArrayHelper::map(User::find()->all(), 'id', 'full_name'),
            [
                'prompt' => '---Chọn nhân viên---',
            ])->label('Chọn nhân viên') ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
