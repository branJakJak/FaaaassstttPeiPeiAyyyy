<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClientLead */

$this->title = 'Update Client Lead: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Client Leads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="client-lead-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
