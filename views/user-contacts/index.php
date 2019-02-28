<?php


use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserContactsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Контактная информация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-contacts-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать новый контакт', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'attribute' => 'id_vid_type',
                'vAlign' => 'middle',
                'width' => '180px',
                'value' => 'sprContactType.type',
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \app\models\UserContactsSearch::find()->joinWith(['sprContactType'])->select(['type', 'id_vid_type'])->indexBy('type')->column(),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Вид контакта'],
                'format' => 'raw'

            ],

//            'id_vid_type',
//            'id_vid_type' =>[
//                'attribute' => 'id_vid_type',
//                'value' => 'sprContactType.type',
//            ],
            'data',
            'comment',
            'user_id',
            [
                'class' => 'kartik\grid\ActionColumn',
                'dropdown' => 'kartik\bs4Dropdown',
                'dropdownOptions' => ['class' => 'col-md-4 dropdown-menu-right'],
                'urlCreator' => function($action, $model, $key, $index) { return Url::to([$action, 'id' => $key]); },
                'viewOptions' => ['title' => 'This will launch the book details page. Disabled for this demo!', 'data-toggle' => 'tooltip'],
                'updateOptions' => ['<?= Html::encode($this->update) ?>', 'title' => 'This will launch the book update page. Disabled for this demo!', 'data-toggle' => 'tooltip'],
                'deleteOptions' => ['title' => 'This will launch the book delete action. Disabled for this demo!', 'data-toggle' => 'tooltip'],
                'headerOptions' => ['class' => 'kartik-sheet-style'],
            ],
//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
