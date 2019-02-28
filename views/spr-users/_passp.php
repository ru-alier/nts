<?php

use app\models\PassportDetailsSearch;
use yii\helpers\Html;
use yii\widgets\DetailView;

if (PassportDetailsSearch::findOne(['user_id'=>$id])===null) {
    echo '<h1>У пользователя (id '.$id. ') не заполненны паспортные данные. <br/>';
    echo Html::a('Создать запись', ['passport-details/create', 'user_id' => $id], ['class' => 'btn btn-success']);
    echo '<h4>* Запомните текущий ID пользователя он вам понадобиться для заполнения формы!</h4>';
    return;
};
$model = PassportDetailsSearch::findOnePassport(['user_id'=>$id]);
?>

<div class="passport-details-form">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'passport_series',
            'passport_number',
            'passport_issued_by',
            'passport_when_issued',
            'passport_division_number',
            'comment',
            'user_id',
        ],
    ]);
    echo Html::a('Отредактировать', ['passport-details/update', 'id' => $model->id], ['class' => 'btn btn-success']);
    ?>

</div>
<br/>
