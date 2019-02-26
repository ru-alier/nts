<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PassportDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Passport Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="passport-details-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Passport Details', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'passport_series',
            'passport_number',
            'passport_issued_by',
            'passport_when_issued',
            //'passport_division_number',
            //'comment',
            //'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
