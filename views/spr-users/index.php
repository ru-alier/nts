<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
use kartik\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SprUsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Справочник пользователей';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spr-users-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
<!--    --><?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Spr Users', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
            'export'=>false,
            'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'class' => 'kartik\grid\ExpandRowColumn',
                'width' => '50px',
                'value' => function ($model, $key, $index, $column) {
                    return GridView::ROW_COLLAPSED;
                },
                'detail' => function ($model, $key, $index, $column) {
                    return Yii::$app->controller->
                    renderPartial('_details.php', ['model' => $model]);
                },
                'headerOptions' => ['class' => 'kartik-sheet-style'],
                'expandOneOnly' => true,
                ],
            [
                'attribute' => 'id',
                    'value' => 'userAddress.city',
            ],
            'login',
            'password',
            'name',
            'last_name',
//            'date_reg',
//            'status_id',
            //'descript:ntext',

            [
                'class' => 'kartik\grid\ActionColumn',
//                'dropdown' => $this->dropdown,
                'dropdownOptions' => ['class' => 'float-right'],
                'urlCreator' => function($action, $model, $key, $index) { return Url::to([$action, 'id' => $key]); },
                'viewOptions' => ['title' => 'This will launch the book details page. Disabled for this demo!', 'data-toggle' => 'tooltip'],
                'updateOptions' => ['<?= Html::encode($this->update) ?>', 'title' => 'This will launch the book update page. Disabled for this demo!', 'data-toggle' => 'tooltip'],
                'deleteOptions' => ['title' => 'This will launch the book delete action. Disabled for this demo!', 'data-toggle' => 'tooltip'],
                'headerOptions' => ['class' => 'kartik-sheet-style'],
            ],

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
