<?php

namespace app\controllers;

use Yii;
use app\models\PPILead;
use yii\base\Model;

class MultipleController extends \yii\web\Controller {
	public function actionIndex() {
		$modelCollection = [];
		$model           = new PPILead();
		if ( \Yii::$app->request->isPost ) {
			foreach ( Yii::$app->request->post( 'PPILead' ) as $keyIndex => $currentPostLead ) {
				$newModel             = new PPILead();
				$newModel->attributes = Yii::$app->request->post( 'PPILead' )[ $keyIndex ];
				$modelCollection[]    = $newModel;
			}
			if ( \Yii::$app->request->post( 'submit' ) === 'Submit' ) {
				/*iterate and prepare to send it to API backend */
				foreach ($modelCollection as $currentModel) {
					$currentModel->save();
				}
			} else {
				$modelCollection[ count( $modelCollection ) ] = new PPILead();
			}
		} else if ( \Yii::$app->request->isGet ) {
			$model->title           = \Yii::$app->request->get( 'title' );
			$model->firstName       = \Yii::$app->request->get( 'first_name' );
			$model->lastName        = \Yii::$app->request->get( 'last_name' );
			$model->houseNumber     = \Yii::$app->request->get( '' );
			$model->houseName       = \Yii::$app->request->get( '' );
			$model->address1        = \Yii::$app->request->get( 'address1' );
			$model->address2        = \Yii::$app->request->get( 'address2' );
			$model->address3        = \Yii::$app->request->get( 'address3' );
			$model->address4        = \Yii::$app->request->get( 'city' ) . \Yii::$app->request->get( 'state' ) . \Yii::$app->request->get( 'province' );
			$model->postCode        = \Yii::$app->request->get( 'postal_code' );
			$model->mobileTelephone = \Yii::$app->request->get( 'phone_code' ) . ' ' . \Yii::$app->request->get( 'phone_number' );
			$model->homeTelephone   = \Yii::$app->request->get( 'alt_phone' );
			$model->email           = \Yii::$app->request->get( 'email' );
			$model->notes           = \Yii::$app->request->get( 'comments' );
			$model->sourceName      = '';
			$model->sourceAffName   = '';
			$model->customerType    = '';
			$modelCollection[]      = $model;
		}

		return $this->render( 'index', [ 'modelCollection' => $modelCollection ] );
	}

}
