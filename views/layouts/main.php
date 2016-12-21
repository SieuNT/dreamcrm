<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use BomCMS\AdminLTE\Menu;
use yii\helpers\Html;
use app\common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="sidebar-mini skin-blue-light fixed">
    <?php $this->beginBody() ?>

    <div class="wrapper">
        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <?= Html::a(Html::img('/img/logo.png', ['class' => 'img-responsive']), ['site/index']); ?>
                </div>
                <?= Menu::widget([
                    'items' => [
                        [
                            'label' => 'Bảng điều khiển',
                            'url' => ['site/index'],
                            'icon' => 'fa fa-home'
                        ],
                        [
                            'label' => 'Dự án',
                            'url' => ['project/index'],
                            'icon' => 'fa fa-cubes',
                        ],
                        [
                            'label' => 'Đối tác',
                            'url' => ['partner/index'],
                            'icon' => 'fa fa-handshake-o'
                        ],
                        [
                            'label' => 'Khách hàng',
                            'url' => ['customer/index'],
                            'icon' => 'fa fa-address-book'
                        ],
                        [
                            'label' => 'Nhân viên',
                            'url' => ['user/index'],
                            'icon' => 'fa fa-users'
                        ],
                        [
                            'label' => 'Thông tin tài khoản',
                            'url' => ['user/me'],
                            'icon' => 'fa fa-user-circle-o'
                        ],
                        [
                            'label' => 'Thoát',
                            'url' => ['site/logout'],
                            'template' => '<a href="{url}" data-method="post"><i class="{icon}"></i> {label}</a>',
                            'icon' => 'fa fa-sign-out',
                            'visible' => !Yii::$app->user->isGuest
                        ],
                    ],
                ]) ?>
            </section>
        </aside>
        <div class="content-wrapper">
            <section class="content">
                <?= Alert::widget() ?>
                <?= $content ?>

            </section>
        </div>
        <footer class="main-footer">
            <p class="pull-right hidden-xs">Power by BaseCMS 1.0</p>
            &copy; Dream CRM 2004 - <?= date('Y') ?>
        </footer>
    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>