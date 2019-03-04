<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="shortcut icon" type="image/x-icon" href="../assets/favicon.ico" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'BaseEditor',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Главная', 'url' => ['/site/index']],
            ['label' => 'Пользователи', 'url' => ['/spr-users']],
            ['label' => 'Контакты', 'url' => ['/user-contacts']],
            ['label' => 'Адеса', 'url' => ['/user-address']],
            ['label' => 'Паспорта', 'url' => ['/passport-details']],
        //    Yii::$app->user->isGuest ? (
        //        ['label' => 'Войти', 'url' => ['/site/login']]
        //    ) : (
        //        '<li>'
        //        . Html::beginForm(['/site/logout'], 'post')
        //        . Html::submitButton(
        //            'Выйти (' . Yii::$app->user->identity->username . ')',
        //            ['class' => 'btn btn-link logout']
        //        )
        //        . Html::endForm()
        //        . '</li>'
        //    )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Внимание!</strong> Ведется работа по доработке сайта, некоторые функции могут быть недоступны или могут работать не корректно.
        </div>

        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; HomeWork <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
<?php if ($this->title == 'Справочник пользователей') echo Html::jsFile("../../assets/myjs/scripts.js"); ?>
</html>
<?php $this->endPage() ?>
