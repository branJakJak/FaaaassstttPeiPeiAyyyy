<?php 


namespace app\components;


/**
 * 
 */
class FastPpiCentreApi extends BrightOfficeApi
{

    /** 
    * @var $serverUrl String
    */
    protected $serverUrl="https://fastppicentre.co.uk/XMLReceive.asmx/CaseApplication";

    protected function generateXML()
    {
        //Generate the XML string
        $XML = "";
        $XML .= "<Application><Cases><Case>";
        $XML .= "<CreateCase>0</CreateCase>";
        $XML .= "<Title>{$this->model->title}</Title>";
        $XML .= "<FirstName>{$this->model->firstName}</FirstName>";
        $XML .= "<LastName>{$this->model->lastName}</LastName>";
        $XML .= "<HouseNumber>{$this->model->houseNumber}</HouseNumber>";
        $XML .= "<HouseName>{$this->model->houseName}</HouseName>";
        $XML .= "<Address1>{$this->model->address1}</Address1>";
        $XML .= "<Address2>{$this->model->address2}</Address2>";
        $XML .= "<Address3>{$this->model->address3}</Address3>";
        $XML .= "<Address4>{$this->model->address4}</Address4>";
        $XML .= "<PostCode>{$this->model->postCode}</PostCode>";
        $XML .= "<HomeTelephone>{$this->model->homeTelephone}</HomeTelephone>";
        $XML .= "<MobileTelephone>{$this->model->mobileTelephone}</MobileTelephone>";
        $XML .= "<Email>{$this->model->email}</Email>";
        $XML .= "<Notes>{$this->model->notes}</Notes>";
        $XML .= "<SourceName>{$this->model->sourceName}</SourceName>";
        $XML .= "<SourceAffName>{$this->model->sourceAffName}</SourceAffName>";
        $XML .= "<CustomerType>{$this->model->customerType}</CustomerType>";
        $XML .= "</Case></Cases></Application>";
        return $XML;
    }
}