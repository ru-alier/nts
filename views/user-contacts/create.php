<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserContacts */

$this->title = 'Создание контактов пользователя';
$this->params['breadcrumbs'][] = ['label' => 'Контакты пользователей ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-contacts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
