<?php

// use app\models\UserContactsSearch;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Widget;
?>
<div class="passport-details-form">
<?php
    echo DetailView::widget([
        'model' => $modelPage,
        'attributes' => [
            'id',
            'id_vid_type',
            [
                'label' => 'Тип связи',
                'value'=>$modelPage->sprContactType->type,
            ],
            'data',
            'comment',
            'user_id',
        ],
    ]);

    echo Html::a('Создать', ['user-contacts/create', 'user_id' => $modelPage->user_id], ['class' => 'btn btn-success', 'style' => 'margin-right: 20px']);
    echo Html::a('Редактировать', ['user-contacts/update', 'id' => $modelPage->id], ['class' => 'btn btn-success text-center', 'style' => 'margin-right: 20px']);
    echo Html::a('Удалить', ['user-contacts/delete', 'id' => $modelPage->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => 'Вы действительно хотите удалить запись,',
            'method' => 'post',
        ],
    ]) 
?>

</div>
<hr><br/>