<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserAddress */

$this->title = 'Редактирование  адреса: ';
$this->params['breadcrumbs'][] = ['label' => 'Адреса', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Пользователь '. $model->user_id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="user-address-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<?= Html::a('Просмотреть основную карточку', ['spr-users/view', 'id' => $model->user_id], ['class' => 'btn btn-primary']); ?>
