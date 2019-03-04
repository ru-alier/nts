<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UserContacts */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Контакты', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Пользователь '.$this->title;

\yii\web\YiiAsset::register($this);
?>
<div class="user-contacts-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы дествительно хотите удалить этот контакт?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'user_id',
            'id',
            'id_vid_type',
            'data',
            'comment',

        ],
    ]) ?>

</div>
<?= Html::a('Просмотреть основную карточку', ['spr-users/view', 'id' => $model->user_id], ['class' => 'btn btn-primary']); ?>