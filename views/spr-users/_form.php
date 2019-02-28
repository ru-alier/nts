<?php

use app\models\SprStatus;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SprUsers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="spr-users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_reg')->textInput() ?>

    <?= $form->field($model, 'status_id')->dropDownList(SprStatus::find()->select(['status_name','id'])->indexBy('id')->column()) ?>

    <?= $form->field($model, 'descript')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Записать', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

