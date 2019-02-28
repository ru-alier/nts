<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserAddress */

$this->title = 'Заполнение адреса пользователя';
$this->params['breadcrumbs'][] = ['label' => 'Адреса', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-address-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<input type="button" onclick="history.back();" value="Назад" class="btn btn-primary"/>
