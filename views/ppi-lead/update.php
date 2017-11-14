<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PPILead */

$this->title = 'Update Ppilead: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Ppileads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ppilead-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
