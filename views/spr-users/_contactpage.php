<?php

use app\models\UserContactsSearch;
use yii\web\Controller;
use yii\helpers\Html;
use yii\widgets\DetailView;
if (UserContactsSearch::findOne(['user_id'=>$id])===null) {
    echo '<h1>У пользователя (id '.$id. ') отсутсвует контактная информация. <br/>';
    echo Html::a('Добавить', ['user-contacts/create', 'user_id' => $id], ['class' => 'btn btn-success']);
    return;
};
$model = UserContactsSearch::find()->andFilterWhere(['user_id'=>$id])->with('sprContactType')->all();

if (count($model)>1)
{
    foreach ($model as $key => $modelPage)
    {
        echo $this->render('_contact', ['modelPage' => $modelPage,'id' => $modelPage->id]);
    }
}  elseif (count($model)===1) 
    {
        echo $this->render('_contact', ['modelPage' => $model[0]]);
    }


?>
