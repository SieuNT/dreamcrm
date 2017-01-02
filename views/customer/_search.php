<?php

use app\models\CustomerResource;
use app\models\Partner;
use app\models\Project;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CustomerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="row">
        <div class="col-xs-4">
            <?= $form->field($model, 'project_id')->dropDownList(
                ArrayHelper::map(Project::find()->all(), 'id', 'title'),
                [
                    'prompt' => '---Chọn dự án---',
                    'onchange' => '$.post("/partner/lists/?id=' . '"+$(this).val(), function(data) {
                $("select#models-partner").html(data);
            });'
                ])->label('Dự Án') ?>
        </div>
        <div class="col-xs-4">
            <?= $form->field($model, 'partner_id')->dropDownList(
                ArrayHelper::map(Partner::find()->all(), 'id', 'full_name'),
                [
                    'prompt' => '---Chọn đối tác---',
                    'id' => 'models-partner'
                ])->label('Đối tác') ?>
        </div>
        <div class="col-xs-4">
            <?= $form->field($model, 'customer_resource_id')->dropDownList(
                ArrayHelper::map(CustomerResource::find()->all(), 'id', 'name'),
                ['prompt' => '---Chọn nguồn khách hàng---'])->label('Nguồn khách hàng') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4"><?= $form->field($model, 'full_name') ?></div>
        <div class="col-xs-4"><?php echo $form->field($model, 'phone_number') ?></div>
        <div class="col-xs-4"><?php echo $form->field($model, 'email') ?></div>
    </div>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Tìm kiếm'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Làm lại'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
