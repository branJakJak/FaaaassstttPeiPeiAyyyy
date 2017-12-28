<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lead".
 *
 * @property int $id
 * @property string $claim_type
 * @property string $credit_provider
 * @property string $provider_ref
 * @property string $job_title
 * @property string $misselling_reasons
 * @property string $created_at
 * @property string $updated_at
 *
 * @property PpiLead[] $ppiLeads
 */
class Lead extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lead';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['misselling_reasons'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['claim_type', 'credit_provider', 'provider_ref', 'job_title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'claim_type' => 'Claim Type',
            'credit_provider' => 'Credit Provider',
            'provider_ref' => 'Provider Ref',
            'job_title' => 'Job Title',
            'misselling_reasons' => 'Misselling Reasons',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpiLeads()
    {
        return $this->hasMany(PpiLead::className(), ['lead_id' => 'id']);
    }
}
