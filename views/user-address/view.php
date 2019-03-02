<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UserAddress */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Адреса', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Пользователь '.$model->user_id;
\yii\web\YiiAsset::register($this);
?>
<div class="user-address-view">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['Удалить', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'user_id',
            [
                'label'=>'Index ID',
                'value'=> $model->id,
            ],
            'country',
            'region',
            'city',
            'street',
            'building',
            'house_number',
            'apartment',
            'comment',
        ],
    ]) ?>

</div>
<?= Html::a('Просмотреть основную карточку', ['spr-users/view', 'id' => $model->user_id], ['class' => 'btn btn-primary']); ?>