<?php

use app\models\SprUsersSearch;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;

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
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <!-- <?php $this->registerJsFile('@web/assets/myjs/scripts.js', ['position' => yii\web\View::POS_END]); ?>  -->
    
    <?php 
    // $this->registerJsFile('@web/assets/myjs/scripts2.js',
    // ['depends' => [yii\bootstrap\BootstrapAsset::className()]]);
    $this->registerCssFile('@web/css/menu.css'); ?> 
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'dateFormat' => 'dd MMMM yyyy',
            'datetimeFormat' => 'php: d-m-Y | H.i.s',
            'locale' => 'ru'
        ],
        'columns' => [
//          disabled through numbering
//            ['class' => 'yii\grid\SerialColumn'],
//          disabling view city
            // [
            //     'attribute' => 'id',
            //     'value' => 'id',
            //     'width' => '70px',
            // ],
//          View Comment field
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
//          disabling view city
//             [
//                 'attribute' => 'city',
//                 'value' => 'userAddress.city',
// //                    SprUsersSearch::find()->joinWith(['userAddress'])
// //                    ->andFilterWhere(['like', 'city', city]),
//                 'label' => 'Город'
//             ],
            'login',
//            'status_id',
           'password',
            'name',
            'last_name',
           'date_reg',
//          View status field
            [
                'class' => 'kartik\grid\BooleanColumn',
                'attribute' => 'status_id',
                'vAlign' => 'middle',
//                'value' => 'sprStatus.status_name',
            ],
            //'descript:ntext',
//          Action field (dropdownmenu)
            // [
            //     'class' => 'kartik\grid\ActionColumn',
            //     'dropdown' => 'kartik\bs4Dropdown',
            //     'dropdownOptions' => ['class' => 'dropdown-menu-right'],
            //     'urlCreator' => function($action, $model, $key, $index) { return Url::to([$action, 'id' => $key]); },
            //     'viewOptions' => ['title' => 'Перейти к просмотру полной карточки пользователя', 'data-toggle' => 'tooltip'],
            //     'updateOptions' => ['<?= Html::encode($this->update) ?*>', 'title' => 'Перейти к редактированию данных пользователя', 'data-toggle' => 'tooltip'],
            //     'deleteOptions' => ['title' => 'Удаление пользователя', 'data-toggle' => 'tooltip'],
            //     'headerOptions' => ['class' => 'kartik-sheet-style'],
            // ],

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>
</div>
<div class="context-menu">
	<div class="context" oncontextmenu="return menu(event);">
		<div class="btn btn-primary">Click here with the right mouse button.</div>
	</div>
	<div class="right-menu">
		<ul>
			<li>
				<a href="#">
					<span>
						<i class="material-icons">create</i>
					</span>
					<span>Edit</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span>
						<i class="material-icons">content_cut</i>
					</span>
					<span>Cut</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span>
						<i class="material-icons">content_copy</i>
					</span>
					<span>Copy</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span>
						<i class="material-icons">library_add</i>
					</span>
					<span>Paste</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span>
						<i class="material-icons">delete</i>
					</span>
					<span>Delete</span>
				</a>
			</li>
		</ul>
	</div>
</div>
