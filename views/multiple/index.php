<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11/21/2017
 * Time: 1:17 AM
 */
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $modelCollection array */
/* @var $currentModel \app\models\PPILead */

?>
<div class="row">
	
	<?php $form = ActiveForm::begin(); ?>	
	<?php foreach ($modelCollection as $index => $currentModel): ?>
		<div class="col-lg-4">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Policy Holder #<?php echo intval($index)+1 ?></h3>
				</div>
				<div class="panel-body">
					<?= Html::errorSummary($currentModel); ?>
					<?= $this->render('_form_template', [
						'model' => $currentModel,
						'form' => $form,
						'index' => $index,
					]) ?>
				</div>
			</div>
		</div>
	<?php endforeach ?>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<?= Html::submitButton('Save', ['class' => 'btn btn-success btn-block btn-lg','value'=>'Submit']) ?>
	</div>
	<?php ActiveForm::end(); ?>
	
</div>
