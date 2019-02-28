<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserAddressSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Адреса пользователей';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-address-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить новый адрес', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
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
                'attribute' =>'user_id',
                'value' => 'user_id',
                'width' => '70px',
                'label' => 'ID'

            ],
            'country',
//            'region',
            'city',
            'street',
            //'building',
            [
                'attribute' => 'house_number',
                'value' => 'house_number',
                'label' => 'Дом',
                'width' => '70px',
//                'vAlign' => 'ALIGN_MIDDLE'
            ],
//            'house_number',
            //'apartment',
//            'comment',
            //'user_id',

            [
                'class' => 'kartik\grid\ActionColumn',
                'dropdown' => 'kartik\bs4Dropdown',
                'dropdownOptions' => ['class' => 'col-md-4 dropdown-menu-right'],
                'urlCreator' => function($action, $model, $key, $index) { return Url::to([$action, 'id' => $key]); },
                'viewOptions' => ['title' => 'Перейти ', 'data-toggle' => 'tooltip'],
                'updateOptions' => ['<?= Html::encode($this->update) ?>', 'title' => 'This will launch the book update page. Disabled for this demo!', 'data-toggle' => 'tooltip'],
                'deleteOptions' => ['title' => 'This will launch the book delete action. Disabled for this demo!', 'data-toggle' => 'tooltip'],
                'headerOptions' => ['class' => 'kartik-sheet-style'],
            ],
//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
