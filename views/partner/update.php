<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Partner */

$this->title = $model->full_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Partners'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="box box-success partner-update">
    <div class="box-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>
