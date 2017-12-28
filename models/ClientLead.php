<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client_lead".
 *
 * @property int $id
 * @property int $client_id
 * @property int $lead_id
 * @property string $date_created
 *
 * @property Client $client
 * @property Lead $lead
 */
class ClientLead extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client_lead';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['client_id', 'lead_id'], 'integer'],
            [['date_created'], 'safe'],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['client_id' => 'id']],
            [['lead_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lead::className(), 'targetAttribute' => ['lead_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client_id' => 'Client ID',
            'lead_id' => 'Lead ID',
            'date_created' => 'Date Created',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::className(), ['id' => 'client_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLead()
    {
        return $this->hasOne(Lead::className(), ['id' => 'lead_id']);
    }
}
