<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PPILead */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ppilead-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'firstName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'houseNumber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'houseName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'postCode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'homeTelephone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobileTelephone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'notes')->textInput(['maxlength' => true]) ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
