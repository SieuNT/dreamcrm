<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CustomerResource */

$this->title = Yii::t('app', 'Create Customer Resource');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customer Resources'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-resource-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
