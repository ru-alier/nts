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
//            Yii::$app->user->isGuest ? (
//                ['label' => 'Login', 'url' => ['/site/login']]
//            ) : (
//                '<li>'
//                . Html::beginForm(['/site/logout'], 'post')
//                . Html::submitButton(
//                    'Logout (' . Yii::$app->user->identity->username . ')',
//                    ['class' => 'btn btn-link logout']
//                )
//                . Html::endForm()
//                . '</li>'
//            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Внимание!</strong> Ведется работа по доработке сейта, некоторые функции могут быть недоступны или будут работать не корректно.
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
<!--    Action and Events временно отключен -->
<!--<script>-->
<!---->
<!--    $(document).ready(function (){-->
<!---->
<!--        console.log( "Объектная модель готова к использованию!" );-->
<!---->
<!--        function addDiv(){-->
<!--            $('tr td').off("dblclick");-->
<!--            $(this).attr('id','active');-->
<!--            let thisName = $(this).text().trim();-->
<!--            $(this).append(`-->
<!--            <div class="input-group" id="tempDiv">-->
<!--            <input type="text" class="form-control" placeholder="новое значение" aria-label="Recipient's username" aria-describedby="button-addon2" id="InputData" value="">-->
<!--            <div class="input-group-append">-->
<!--            <button class="btn btn-success" style="margin-top: 10px" type="button" id="superButton">Сохранить</button>-->
<!--            <button class="btn btn-primary" style="margin-top: 10px" type="button" id="cancelButton">Отменить</button>-->
<!--            <button class="btn btn-primary" style="margin-top: 10px" type="button" id="dButton">Удалить</button>-->
<!--            </div>-->
<!--            </div>-->
<!--            `-->
<!--            );-->
<!--            $('#InputData').val(thisName);-->
<!---->
<!--        };-->
<!---->
<!--        function delDiv() {-->
<!--            $('#tempDiv').remove();-->
<!--            $('td').attr('id', null);-->
<!--            $('tr td').on("dblclick", addDiv);-->
<!--        };-->
<!---->
<!--        function appendData() {-->
<!--            if(confirm('Применить изменения?')) {-->
<!--                let nameInput = $('#InputData').val();-->
<!--                $(this).closest('td').text(nameInput);-->
<!--                $('#active').css({-->
<!--                "background-color": "green",-->
<!--                    "border-left": "2px solid yellow"-->
<!--                });-->
<!--                delDiv();-->
<!--            }-->
<!--       };-->
<!---->
<!--        function delElement() {-->
<!--            var tempID = $(this).parents('tr').data('key');-->
<!--            if (confirm('Ты серьезно хочешь удалить \n пользователя с ID: ' + tempID +'?')) {-->
<!--            alert('Пользовательна всегда удален :(');-->
<!--            $('[data-key='+tempID+']').css({-->
<!--                "background-color": "red",-->
<!--                "border-left": "2px solid yellow"-->
<!--            });-->
<!--                $('#active').css({-->
<!--                    "background-color": "red",-->
<!--                    "border-left": "2px solid yellow"-->
<!--                });-->
<!--            delDiv();-->
<!--        }-->
<!--        };-->
<!---->
<!--        $('table').on('click', '#dButton', delElement);-->
<!---->
<!--        $('tr td').on("dblclick", addDiv);-->
<!---->
<!--        $('table').on('click', '#superButton', appendData);-->
<!---->
<!--        $('table').on('click', '#cancelButton', delDiv);-->
<!---->
<!--    $(this).click(function(e){-->
<!--        console.log();-->
<!--    });-->
<!---->
<!--    });-->
<!--</script>-->
</body>
</html>
<?php $this->endPage() ?>
