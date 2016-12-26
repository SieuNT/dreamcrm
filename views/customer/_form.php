<?php

use app\models\CustomerResource;
use app\models\Partner;
use app\models\Project;
use kartik\daterange\DateRangePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'project_id')->dropDownList(
        ArrayHelper::map(Project::find()->all(), 'id', 'title'),
        [
            'prompt' => '---Chọn dự án---',
            'onchange' => '$.post("/partner/lists/?id=' . '"+$(this).val(), function(data) {
                $("select#models-partner").html(data);
            });'
        ])->label('Dự Án') ?>

    <?= $form->field($model, 'partner_id')->dropDownList(
        ArrayHelper::map(Partner::find()->all(), 'id', 'full_name'),
        [
            'prompt' => '---Chọn đối tác---',
            'id' => 'models-partner'
        ])->label('Đối tác') ?>

    <?= $form->field($model, 'customer_resource_id')->dropDownList(
        ArrayHelper::map(CustomerResource::find()->all(), 'id', 'name'),
        ['prompt' => '---Chọn nguồn khách hàng---'])->label('Nguồn khách hàng') ?>

    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <label for="contract_date">Ngày giao khách</label>
        <div class="input-group drp-container">
            <?= DateRangePicker::widget([
                'model' => $model,
                'attribute' => 'delivery_date',
                'useWithAddon' => true,
                'convertFormat' => true,
                'pluginOptions' => [
                    'opens' => 'right',
                    'timePicker' => false,
                    'locale' => ['format' => 'd-m-Y'],
                    'singleDatePicker' => true,
                    'showDropdowns' => true,
                    'readonly' => true
                ],
            ]) ?>
            <span class="input-group-addon">
                <i class="glyphicon glyphicon-calendar"></i>
            </span>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
