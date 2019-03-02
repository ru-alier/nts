<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserContacts */

$this->title = 'Редактирование контакта пользователя: ' . $model->user_id;
$this->params['breadcrumbs'][] = ['label' => 'Контакты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Пользователь '.$model->user_id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="user-contacts-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<?= Html::a('Просмотреть основную карточку', ['spr-users/view', 'id' => $model->user_id], ['class' => 'btn btn-primary']); ?>