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

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true])->label('Пароль (минимум 4 символа)') ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'date_reg')->textInput()->label('Дата регистрации (YYYY-mm-dd, год-месяц-день)') ?>
    <?= $form->field($model, 'date_reg')->widget(
    \kartik\widgets\DateTimePicker::className(), [
        'name' => 'date_reg',
        'pluginOptions' => 
        [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd hh:ii:ss'
        ]
]);?>
 
    <?= $form->field($model, 'status_id')->dropDownList(SprStatus::find()->select(['status_name','id'])->indexBy('id')->column()) ?>

    <?= $form->field($model, 'descript')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary',
        'data' => 
        [
            'confirm' => 'Вы действительно хотите сохранить изменения?',
            'method' => 'post',
            ]
        ]) ?>
        <?= Html::a('Отменить', ['spr-users/index'], ['class' => 'btn btn-primary']); ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>

