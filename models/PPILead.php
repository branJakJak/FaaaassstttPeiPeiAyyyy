<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "ppilead".
 *
 * @property int $id
 * @property string $title
 * @property string $firstName
 * @property string $lastName
 * @property string $houseNumber
 * @property string $houseName
 * @property string $address1
 * @property string $address2
 * @property string $address3
 * @property string $address4
 * @property string $postCode
 * @property string $homeTelephone
 * @property string $mobileTelephone
 * @property string $email
 * @property string $notes
 * @property string $sourceName
 * @property string $sourceAffName
 * @property string $customerType
 * @property string $reference_id
 * @property string $created_at
 * @property string $updated_at
 */
class PPILead extends \yii\db\ActiveRecord
{
    public $sourceName="anthonye";
    public $sourceAffName="anthonye";
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppilead';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'notes'], 'safe'],
            [['title', 'firstName', 'lastName', 'houseNumber', 'houseName', 'address1', 'address2', 'address3', 'address4', 'postCode', 'homeTelephone', 'mobileTelephone', 'email', 'sourceName', 'sourceAffName', 'customerType','reference_id'], 'string', 'max' => 255],
            [['email'], 'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'houseNumber' => 'House Number',
            'houseName' => 'House Name',
            'address1' => 'Address1',
            'address2' => 'Address2',
            'address3' => 'Address3',
            'address4' => 'Address4',
            'postCode' => 'Post Code',
            'homeTelephone' => 'Home Telephone',
            'mobileTelephone' => 'Mobile Telephone',
            'email' => 'Email',
            'notes' => 'Notes',
            'sourceName' => 'Source Name',
            'sourceAffName' => 'Source Aff Name',
            'customerType' => 'Customer Type',
            'reference_id' => 'Reference ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }
}
