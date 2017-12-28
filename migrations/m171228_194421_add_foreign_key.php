<?php

use yii\db\Migration;

/**
 * Class m171228_194421_add_foreign_key
 */
class m171228_194421_add_foreign_key extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addForeignKey('client_fk', 'client_lead', 'client_id', 'client', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('lead_fk', 'client_lead', 'lead_id', 'lead', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropForeignKey('client_fk', 'client_lead');
        $this->dropForeignKey('lead_fk', 'client_lead');
    }

}
