<?php

use app\models\UserAddressSearch;
use yii\helpers\Html;
use yii\widgets\DetailView;

if (UserAddressSearch::findOne(['user_id'=>$id])===null) {
    echo '<h1>У пользователя (id '.$id. ') отсутсвует адрес информация. <br/>';
    echo Html::a('Создать запись', ['user-address/create', 'user_id' => $id], ['class' => 'btn btn-success']);
    echo '<h4>* Запомните текущий ID пользователя он вам понадобиться для заполнения формы!</h4>';
    return;
};
$model = UserAddressSearch::findOne(['user_id'=>$id]);
?>

<div class="passport-details-form">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'country',
            'region',
            'city',
            'street',
            'building',
            'house_number',
            'apartment',
            'comment',
            'user_id',
        ],
    ]);
    echo Html::a('Создать', ['user-address/create', 'user_id' => $model->user_id], ['class' => 'btn btn-success', 'style' => 'margin-right: 20px']);
    echo Html::a('Редактировать', ['user-address/update', 'id' => $model->id], ['class' => 'btn btn-success text-center', 'style' => 'margin-right: 20px']);
    echo Html::a('Удалить', ['user-address/delete', 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => 'Вы действительно хотите удалить запись,',
            'method' => 'post',
        ],
    ]);
    ?>

</div>
<br/>
