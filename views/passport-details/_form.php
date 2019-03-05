<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PassportDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="passport-details-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'passport_series')->textInput()->label('Серия (4 цифры)') ?>

    <?= $form->field($model, 'passport_number')->textInput()->label('Номер (6 цифр)') ?>

    <?= $form->field($model, 'passport_issued_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'passport_when_issued')->textInput() ?>

    <?= $form->field($model, 'passport_division_number')->textInput(['maxlength' => true])->label('Номер подразделения (6 цифр через дифис xxx-xxx)') ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success',
        'data' => 
        [
            'confirm' => 'Вы действительно хотите сохранить изменения?',
            'method' => 'post',
        ]]) ?>
        <input type="button" onclick="history.back();" value="Назад" class="btn btn-primary"/>
    </div>

    <?php ActiveForm::end(); ?>

</div>
