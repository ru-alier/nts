<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PassportDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Паспортные данные';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="passport-details-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Заполнить паспортные данные', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
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
                'attribute' => 'passport_series',
                'value' => 'passport_series',
//                'label' => 'Серия',
                'width' => '70px',
//                'vAlign' => 'ALIGN_MIDDLE'
            ],
            [
                'attribute' => 'passport_number',
                'value' => 'passport_number',
//                'label' => 'Номер',
                'width' => '80px',
//                'vAlign' => 'ALIGN_MIDDLE'
            ],
//            'passport_series',
//            'passport_number',
            'passport_issued_by',
            'passport_when_issued',
            'passport_division_number',
            //'comment',
            //'user_id',

            [
                'class' => 'kartik\grid\ActionColumn',
                'dropdown' => 'kartik\bs4Dropdown',
                'dropdownOptions' => ['class' => 'dropdown-menu-right'],
                'urlCreator' => function($action, $model, $key, $index) { return Url::to([$action, 'id' => $key]); },
                'viewOptions' => ['title' => 'Перейти к просмотру пользователя', 'data-toggle' => 'tooltip'],
                'updateOptions' => ['<?= Html::encode($this->update) ?>', 'title' => 'Перейти к редактированию паспорта пользователя', 'data-toggle' => 'tooltip'],
                'deleteOptions' => ['title' => 'Произвести удаление паспорта пользователя', 'data-toggle' => 'tooltip'],
                'headerOptions' => ['class' => 'kartik-sheet-style'],
            ],

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
