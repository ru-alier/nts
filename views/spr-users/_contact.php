<?php

use app\models\UserContactsSearch;
use yii\helpers\Html;
use yii\widgets\DetailView;

if (UserContactsSearch::findOne(['user_id'=>$id])===null) {
    echo '<h1>У пользователя (id '.$id. ') отсутсвует контактная информация. <br/>';
    echo Html::a('Создать запись', ['user-contacts/create', 'user_id' => $id], ['class' => 'btn btn-success']);
    echo '<h4>* Запомните текущий ID пользователя он вам понадобиться для заполнения формы!</h4>';
    return;
};
$model = UserContactsSearch::find()->with('sprContactType')->andFilterWhere(['user_id'=>$id])->one();
print_r($model);
?>

<div class="passport-details-form">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_vid_type',
            [
                'label' => 'Тип связи',
                'value'=>$model->sprContactType->type,
            ],
            'data',
            'comment',
            'user_id',
        ],
    ]);
    echo Html::a('Отредактировать', ['user-contacts/update', 'id' => $model->id], ['class' => 'btn btn-success']);
    ?>

</div>
<br/>