<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PassportDetails */

$this->title = 'Create Passport Details';
$this->params['breadcrumbs'][] = ['label' => 'Passport Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="passport-details-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
