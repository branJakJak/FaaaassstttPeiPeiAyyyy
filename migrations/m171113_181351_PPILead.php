<?php

use yii\db\Migration;

/**
 * Class m171113_181351_PPILead
 */
class m171113_181351_PPILead extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        
        }
        $this->createTable('{{%ppilead}}', [
            'id' => $this->primaryKey(),
            "title" =>  $this->string(), 
            "firstName" =>  $this->string(), 
            "lastName" =>  $this->string(), 
            "houseNumber" =>  $this->string(), 
            "houseName" =>  $this->string(), 
            "address1" =>  $this->string(), 
            "address2" =>  $this->string(), 
            "address3" =>  $this->string(), 
            "address4" =>  $this->string(), 
            "postCode" =>  $this->string(), 
            "homeTelephone" =>  $this->string(), 
            "mobileTelephone" =>  $this->string(), 
            "email" =>  $this->string(), 
            "notes" =>  $this->text(),
            "sourceName" =>  $this->string(), 
            "sourceAffName" =>  $this->string(), 
            "customerType" =>  $this->string(), 
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ], $tableOptions);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('{{%ppilead}}');
    }

}