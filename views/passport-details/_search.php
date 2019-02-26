<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PassportDetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="passport-details-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'passport_series') ?>

    <?= $form->field($model, 'passport_number') ?>

    <?= $form->field($model, 'passport_issued_by') ?>

    <?= $form->field($model, 'passport_when_issued') ?>

    <?php // echo $form->field($model, 'passport_division_number') ?>

    <?php // echo $form->field($model, 'comment') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
