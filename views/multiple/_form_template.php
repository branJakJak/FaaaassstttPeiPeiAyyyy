<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PPILead */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ppilead-form">



	<?= $form->field($model, "[$index]title")->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, "[$index]firstName")->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, "[$index]lastName")->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, "[$index]houseNumber")->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, "[$index]houseName")->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, "[$index]postCode")->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, "[$index]address1")->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, "[$index]address2")->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, "[$index]address3")->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, "[$index]address4")->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, "[$index]homeTelephone")->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, "[$index]mobileTelephone")->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, "[$index]email")->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, "[$index]notes")->textInput(['maxlength' => true]) ?>



	<div class="form-group">
		<?= Html::submitButton('Add another', ['class' => 'btn btn-info pull-right','value'=>'new_account']) ?>
		<div class="clearfix"></div>
	</div>

	

</div>
