<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PassportDetails */

$this->title = 'Редактирование паспорта: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Паспортные данные', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Пользователь '. $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'редактирование';
?>
<div class="passport-details-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<?= Html::a('Просмотреть основную карточку', ['spr-users/view', 'id' => $model->user_id], ['class' => 'btn btn-primary']); ?>
