<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client".
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
 * @property string $date_of_birth
 * @property string $homeTelephone
 * @property string $mobileTelephone
 * @property string $email
 * @property string $company
 * @property string $notes
 * @property string $created_at
 * @property string $updated_at
 *
 * @property PpiLead[] $ppiLeads
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['notes'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'firstName', 'lastName', 'houseNumber', 'houseName', 'address1', 'address2', 'address3', 'address4', 'postCode', 'date_of_birth', 'homeTelephone', 'mobileTelephone', 'email', 'company'], 'string', 'max' => 255],
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
            'date_of_birth' => 'Date Of Birth',
            'homeTelephone' => 'Home Telephone',
            'mobileTelephone' => 'Mobile Telephone',
            'email' => 'Email',
            'company' => 'Company',
            'notes' => 'Notes',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpiLeads()
    {
        return $this->hasMany(PpiLead::className(), ['client_id' => 'id']);
    }
}
