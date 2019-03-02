<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserContacts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-contacts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput()->label('ID пользователя (для связи с краточкой)') ?>

    <?= $form->field($model, 'id_vid_type')->dropDownList(
        \app\models\SprContactType::find()->select(['type','id'])->indexBy('id')->column()
    ) ?>

    <?= $form->field($model, 'data')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Записать', ['class' => 'btn btn-success',
        'data' => 
        [
            'confirm' => 'Вы действительно хотите сохранить изменения?',
            'method' => 'post',
        ]]) ?>
        <input type="button" onclick="history.back();" value="Назад" class="btn btn-primary"/>
    </div>

    <?php ActiveForm::end(); ?>

</div>
