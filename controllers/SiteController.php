<?php

namespace app\controllers;

use app\components\BrightOfficeApi;
use app\models\PPILead;
use Yii;
use yii\db\Exception;
use yii\filters\AccessControl;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        /* @var $apiBackend FastPpiCentreApi */
        $model = new PPILead();
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $apiBackend = \Yii::$app->apiBackend;
            try{
                $apiBackend->setModel($model);
                $resultMessages = $apiBackend->send();
                $resultMessages = implode(".", $resultMessages);
                $resultMessagesArr = explode(" ", $resultMessages);
                if (count($resultMessagesArr) === 1) {
                    /*success*/
                    $resultMessages = ltrim($resultMessages);
                    $resultMessages = rtrim($resultMessages);
                    $model->reference_id = $resultMessages;
                    $model->save();
                    $referenceLink = Html::a($resultMessages, Url::to(['/ppi-lead/view',"id"=>$model->id]));
                    \Yii::$app->session->setFlash('success', "Record created. Here is your reference id : ".$referenceLink);

                } else{
                    // there is an error
                    \Yii::$app->session->setFlash('error', "We met some error : ".$resultMessages );
                }
            } catch (Exception $ex) {
                \Yii::$app->session->setFlash('error', $ex->getMessage());
            }
        } else if (\Yii::$app->request->isGet) {
            $model->title = \Yii::$app->request->get('title');
            $model->firstName = \Yii::$app->request->get('first_name');
            $model->lastName = \Yii::$app->request->get('last_name');
            $model->houseNumber = \Yii::$app->request->get('');
            $model->houseName = \Yii::$app->request->get('');
            $model->address1 = \Yii::$app->request->get('address1');
            $model->address2 = \Yii::$app->request->get('address2');
            $model->address3 = \Yii::$app->request->get('address3');
            $model->address4 = \Yii::$app->request->get('city') . \Yii::$app->request->get('state') . \Yii::$app->request->get('province');
            $model->postCode = \Yii::$app->request->get('postal_code');
            $model->mobileTelephone = \Yii::$app->request->get('phone_code').' '.\Yii::$app->request->get('phone_number');
            $model->homeTelephone = \Yii::$app->request->get('alt_phone');
            $model->email = \Yii::$app->request->get('email');
            $model->notes = \Yii::$app->request->get('comments');
            $model->sourceName = '';
            $model->sourceAffName = '';
            $model->customerType = '';
        }
        return $this->render('index',['model'=>$model]);
    }

}
