<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\helpers\Url;
use yii\widgets\Menu;

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
<body>
<?php $this->beginBody() ?>

<div class="navbar">
    <div class="navbar-inner">
        <a class="brand" href="<?= Url::toRoute('app/index'); ?>">Сайтсофт</a>

        <? echo Menu::widget([
            'items' => [
                ['label' => 'Главная', 'url' => ['app/index']],
                ['label' => 'Авторизация', 'url' => ['app/login'], 'visible' => Yii::$app->user->isGuest],
                ['label' => 'Регистрация', 'url' => ['app/signup'], 'visible' => Yii::$app->user->isGuest],
            ],
            'options' => [
                 'class' => 'nav'
            ]
        ]);?>

        <?
        if (!Yii::$app->user->isGuest) {
            echo Menu::widget([
                'items' => [
                    ['label' => Yii::$app->user->identity->username, 'url' => ['app/index']],
                    ['label' => 'Выход', 'url' => ['app/logout']]
                ],
                'options' => [
                    'class' => 'nav pull-right'
                ]
            ]);
        }
        ?>

    </div>
</div>

<?= $content ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>