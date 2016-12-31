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
        <?php Pjax::begin(); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
//            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'full_name',
                    'label' => 'Họ tên'
                ],
                [
                    'attribute' => 'phone_number',
                    'label' => 'Số điện thoại'
                ],
                [
                    'attribute' => 'email',
                    'label' => 'Email',
                    'format' => 'email'
                ],
                [
                    'attribute' => 'project.title',
                    'label' => 'Dự án'
                ],
                [
                    'class' => 'yii\grid\DataColumn',
                    'attribute' => 'start_date:date',
                    'label' => 'Hợp đồng',
                    'value' => function($model) {
                        return Yii::$app->formatter->asDate($model->start_date) . ' đến ' . Yii::$app->formatter->asDate($model->end_date);
                    }
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'buttons' => [
                        'user' => function ($url, $model, $key) {
                            return Html::a('<i class="fa fa-user-o" aria-hidden="true"></i>', [$url]);
                        },
                    ],
                    'template' => '{user} {update} {delete}'
                ],
            ],
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>
