<?php

use yii\db\Migration;

/**
 * Handles the creation of table `lead`.
 */
class m171228_162359_create_lead_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('lead', [
            'id' => $this->primaryKey(),
            "claim_type" =>  $this->string(),
            "credit_provider" =>  $this->string(),
            "provider_ref" =>  $this->string(),
            "job_title" =>  $this->string(),
            "misselling_reasons" =>  $this->text(),//json encoded
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('lead');
    }
}
