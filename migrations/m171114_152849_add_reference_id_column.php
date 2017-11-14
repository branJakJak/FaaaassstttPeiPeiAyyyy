<?php

use yii\db\Migration;

/**
 * Class m171114_152849_add_reference_id_column
 */
class m171114_152849_add_reference_id_column extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('{{%ppilead}}', "reference_id", $this->string());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('{{%ppilead}}', "reference_id");
    }


}
