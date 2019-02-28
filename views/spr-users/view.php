<?php


use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SprUsers */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Справочник пользователей', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="spr-users-view">

    <h1>Пользователь: <?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
<?php    $status = \app\models\SprUsersSearch::find()->with(['sprStatus'])->where(['id'=>$model->id])->one(); ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'login',
            'password',
            'name',
            'last_name',
            'date_reg',
            [
                'attribute'=>'status_id',
                'value'=> $status->sprStatus->status_name
            ],
//            'status_id',
            'descript:ntext',
        ],
    ]) ?>

</div>

<div>
<!--<ul class="nav nav-tabs">-->
<!--    <li class="active"><a href="--><?//= Url::toRoute(['passport-details/view', 'id'=> $model->id]); ?><!--">Паспорт</a></li>-->
<!--    <li><a href="--><?//= Url::toRoute(['user-address/view', 'id'=> $model->id]); ?><!--">Адрес</a></li>-->
<!--    <li><a href="--><?//= Url::toRoute(['user-contacts/view', 'id'=> $model->id]); ?><!--">Контакты</a></li>-->
<!--</ul>-->
<?php //echo Yii::$app->controller->render(Url::toRoute(Url::toRoute(['passport-details/view', 'id'=> $model->id]))) ?>
<?php

//$contacts = \app\models\UserContactsSearch::find()->where(['user_id'=>$model->id])->asArray()->all();

//$contTab=[];0
//
//foreach ($contacts as $item){
//    $idTemp = $item[id];
//    $contTab=array_push(['label'=>'контакт'.$idTemp], ['content'=>$this->render('_contact', cpmpact[id]);

//};
//['label' => 'Адрес 1'.$model->id,'content' => $this->render('_contact', ['id' => $model->id])],
//
//['label' => 'Адрес 2','content' => $this->render('_contact', ['id' => $model->id])]]



echo \yii\bootstrap\Tabs::widget([
'items' => [
    [
     'label' => 'Контакты',
//     'items'=>[
//             [
            'label' => 'Контакты',
            'content' => $this->render('_contact', ['id' => $model->id])
            ],
//            [
//            'label' => 'Контакт 2',
//            'content' => $this->render('_contact', ['id' => $contacts[1]])
//            ],
//            [
//             'label' => 'Контакт 3',
//             'content' => $this->render('_contact', ['id' => $contacts[2]])
//            ],
//            [
//             'label' => 'Контакт 4',
//             'content' => $this->render('_contact', ['id' => $contacts[3]])
//            ],
//            ]
//    ],

    ['label' => 'Адрес',
    'content' => $this->render('_address', ['id' => $model->id])
    ],
    ['label' => 'Паспорт',
    'content' => $this->render('_passp', ['id' => $model->id])
    ],
]])



//echo \yii\bootstrap\Carousel::widget([
//    'items' => [
//
//        ['label' => 'Контакты', 'content' => '<h1>1</h1>', 'active' => 'true'],
//        ['label' => 'Адрес', 'content' => '<h1>2</h1>'],
//        ['label' => 'Паспорт', 'content' => '<h1>3</h1>'],
//    ]]);
?>
</div()>
<input type="button" onclick="history.back();" value="Назад" class="btn btn-primary"/>