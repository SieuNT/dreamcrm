<?php

use app\models\User;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Customers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success customer-index">
    <div class="box-body">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a(Yii::t('app', 'Create Customer'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <?php Pjax::begin(); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'full_name',
                    'label' => 'Họ tên'
                ],
                [
                    'attribute' => 'phone_number',
                    'label' => 'Số điện thoại',
                    'value' => function($model) {

                        $role = Yii::$app->user->identity->role;
                        if($role !== User::ROLE_ADMIN) {
                            $userID = Yii::$app->user->identity->id;
                            $employeeID = $model->partner->user->id;
                            if($employeeID === $userID) {
                                return $model->phone_number;
                            }
                        }
                    }
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
                    'attribute' => 'partner.full_name',
                    'label' => 'Đối tác'
                ],
                [
                    'attribute' => 'partner.user.full_name',
                    'label' => 'Nhân viên'
                ],
                [
                    'attribute' => 'customerResource.name',
                    'label' => 'Nguồn khách hàng'
                ],
                [
                    'attribute' => 'delivery_date',
                    'label' => 'Ngày giao khách',
                    'format' => 'date'
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update} {delete}',

                ],
            ],
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>
