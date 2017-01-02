<?php

use app\models\User;
use kartik\daterange\DateRangePicker;
use kartik\money\MaskMoney;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use app\models\Project;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Partner */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="partner-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'project_id')->dropDownList(
        ArrayHelper::map(Project::find()->all(), 'id', 'title'),
        ['prompt' => '---Chọn dự án---'])->label('Dự Án') ?>

    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <label for="contract_date">Thời hạn hợp đồng</label>
        <div class="input-group drp-container">
            <?php
            echo DateRangePicker::widget([
                'model' => $model,
                'attribute' => 'contract_date',
                'useWithAddon' => true,
                'convertFormat' => true,
                'startAttribute' => 'start_date',
                'endAttribute' => 'end_date',
                'pluginOptions' => [
                    'opens' => 'right',
                    'locale' => [
                        'format' => 'd-m-Y'
                    ],
                ]
            ]);

            ?>
            <span class="input-group-addon">
            <i class="glyphicon glyphicon-calendar"></i>
        </span>
        </div>
    </div>
    <?= $form->field($model, 'contract_value')->widget(MaskMoney::className(), [
        'pluginOptions' => [
            'suffix' => 'đ',
            'allowNegative' => false
        ]
    ]) ?>
    <?= $form->field($model, 'real_value')->widget(MaskMoney::className(), [
        'pluginOptions' => [
            'suffix' => 'đ',
            'allowNegative' => false
        ]
    ]) ?>
    <?= $form->field($model, 'user_id')->dropDownList(
        ArrayHelper::map(User::find()->all(), 'id', 'full_name'),
        ['prompt' => '---Chọn nhân viên---'])->label('Nhân viên') ?>

    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
