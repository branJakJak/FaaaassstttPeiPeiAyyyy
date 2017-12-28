<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ClientLead */

$this->title = 'Create Client Lead';
$this->params['breadcrumbs'][] = ['label' => 'Client Leads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-lead-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
