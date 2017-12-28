<?php

use yii\db\Migration;

/**
 * Handles the creation of table `client`.
 */
class m171228_162146_create_client_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('client', [
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
            "date_of_birth" =>  $this->string(), 
            "homeTelephone" =>  $this->string(), 
            "mobileTelephone" =>  $this->string(), 
            "email" =>  $this->string(), 
            "company" =>  $this->string(), 
            "notes" =>  $this->text(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('client');
    }
}
