<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PartnerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Partners');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success partner-index">
    <div class="box-body">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <?php Pjax::begin(); ?>    <?= GridView::widget([
            'dataProvider' => $dataProvider,
//            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

//                'id',
                'full_name',
                'phone_number',
                'email:email',
                'project.title',

                'start_date:date',
                'end_date:date',
                // 'notes:ntext',
                // 'status',
                // 'created_by',
                // 'updated_by',
                // 'created_at',
                // 'updated_at',

                ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}'],
            ],
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>
