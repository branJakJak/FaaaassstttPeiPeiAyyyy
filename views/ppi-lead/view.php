<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PPILead */

$this->title = $model->title . ' '.$model->firstName.' '.$model->lastName;
$this->params['breadcrumbs'][] = ['label' => 'Ppileads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppilead-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'firstName',
            'lastName',
            'houseNumber',
            'houseName',
            'address1',
            'address2',
            'address3',
            'address4',
            'postCode',
            'homeTelephone',
            'mobileTelephone',
            'email:email',
            'notes',
            'reference_id',
//            'sourceName',
//            'sourceAffName',
//            'customerType',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
