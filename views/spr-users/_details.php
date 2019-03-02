<?php
use yii\helpers\Html;
echo 'ID: '. $model -> id.'<br/>';
echo 'Примечание:' .$model -> descript;
echo Html::a('Удалить', ['delete', 'id' => $model->id], [
    'class' => 'btn btn-danger pull-right',
    'data' => [
        'confirm' => 'Вы действительно хотите удалить пользователя?',
        'method' => 'post',
    ]]);
echo Html::a('Просмотреть', ['view', 'id' => $model->id], ['class' => 'btn btn-primary pull-right', 'style' => 'margin-right:20px']);?>

