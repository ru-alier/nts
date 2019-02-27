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
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
<!--    Action and Events -->
<script>

    $(document).ready(function (){

        console.log( "Объектная модель готова к использованию!" );

        function addDiv(){
            $(this).attr('id','active');
            let thisName = $(this).text().trim();
            $(this).append(`
            <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="новое значение" aria-label="Recipient's username" aria-describedby="button-addon2" id="InputData" value="">
            <div class="input-group-append">
            <button class="btn btn-success" style="margin-top: 10px" type="button" id="superButton">Сохранить</button><span col-1><span>
            <button class="btn btn-primary" style="margin-top: 10px" type="button" id="cancelButton">Отменить</button>
            </div>
            </div>
            `
            );
            $('#InputData').val(thisName);
            $('tr td').off("dblclick");
        };

        function delDiv() {
            $(this).parents('.input-group').remove();
            $('td').attr('id', null);
            $('tr td').on("dblclick", addDiv);
        };

        function appendData() {
            if(confirm('Применить изменения?')) {
                let nameInput = $('#InputData').val();
                $(this).closest('td').text(nameInput);
                delDiv();
            }
       };


        $('tr td').on("dblclick", addDiv);

        $('table').on('click', 'tbody #superButton', appendData);

        $('table').on('click', 'tbody #cancelButton', delDiv);

    });
</script>
</body>
</html>
<?php $this->endPage() ?>
