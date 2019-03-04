<?php


use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\SprUsers */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Справочник пользователей', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseUserInfo" aria-expanded="false" aria-controls="collapseUserInfo">
Просмотреть основную запись
  </button>
<div class="collapse" id="collapseUserInfo">

    <h1>Пользователь: <?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить пользователя?',
                'method' => 'post',
            ]
        ]) ?>
    </p>



<?php $status = \app\models\SprUsersSearch::find()->with(['sprStatus'])->where(['id'=>$model->id])->one(); ?>
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
<?php

echo \yii\bootstrap\Tabs::widget([
'items' => [
    [
    'label' => "<i class=\"glyphicon glyphicon-phone-alt\" aria-hidden=\"true\"></i> Место жительства",
    'encode' => false,
    'content' => $this->render('_address', ['id' => $model->id])
    ],
    ['label' => "<i class=\"glyphicon glyphicon-user \" aria-hidden=\"true\"></i> Паспортные данные",
    'encode' => false,
    'content' => $this->render('_passp', ['id' => $model->id])
    ],
    [
    'label' => "<i class=\"glyphicon glyphicon-home\" aria-hidden=\"true\"></i> Контактная информация",
    'encode' => false,
    'content' => $this->render('_contactpage', ['id' => $model->id])
    ],
]])

?>
</div>