<?php

use yii\db\Migration;

/**
 * Handles the creation of table `client_lead`.
 */
class m171228_194332_create_client_lead_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('client_lead', [
            'id' => $this->primaryKey(),
            'client_id' => $this->integer(),
            'lead_id' => $this->integer(),
            'date_created' => $this->dateTime(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('client_lead');
    }
}
