<?php

/* @var $this yii\web\View */
/* @var $model \app\models\PPILead */

use kartik\helpers\Html;
use yii\bootstrap\ActiveForm;


$this->title = Yii::$app->name;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>FAST PPi Lead!</h1>
        <p class="lead">Please check the information before submitting.</p>
    </div>
    <?php if ($model->hasErrors()): ?>
        <?= Html::errorSummary($model) ?>
    <?php endif; ?>


    <div class="body-content">

        <?php $this->beginBlock('form'); ?>
                <div class="ppilead-form" style="padding: 30px;">
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

                    <?= $form->field($model, 'notes')->textarea(['style'=>"margin: 0px -6px 0px 0px; width: 693px; height: 145px;"]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-primary btn-block','style'=>'font-size: 20px']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
        <?php $this->endBlock(); ?>
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8" style="">
            <?=
            Html::panel(
                [
                    'heading' => 'Please check the details before submitting',
                    'body' => $this->blocks['form']
                ],
                Html::TYPE_INFO
            );
            ?>
            </div>
            <div class="col-lg-2"></div>
        </div>


    </div>
</div>
