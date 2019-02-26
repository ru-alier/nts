<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SprUsers */

$this->title = 'Create Spr Users';
$this->params['breadcrumbs'][] = ['label' => 'Spr Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spr-users-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
