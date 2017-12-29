<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11/14/2017
 * Time: 4:36 PM
 */

namespace app\components;


use app\models\PPILead;
use Verdant\XML2Array;
use yii\base\Component;
use yii\db\Exception;

class BrightOfficeApi extends Component
{
    /**
     * @var $model PPILead
     */
    public $model;
    /** 
    * @var $xmlResponse String
    */
    protected $xmlResponse;
    /** 
    * @var $serverUrl String
    */
    protected $serverUrl="http://www.claimscrm.co.uk/XMLReceive.asmx/CaseApplication";

    /** 
    * @var $clientCode String
    */    
    protected $clientCode;

    public function getClientCode()
    {
        return $this->clientCode;
    }
    public function setClientCode($clientCode)
    {
        $this->clientCode = $clientCode;
    }

    /**
     * @return mixed
     */
    public function getXmlResponse()
    {
        return $this->xmlResponse;
    }

    /**
     * @param mixed $xmlResponse
     */
    public function setXmlResponse($xmlResponse)
    {
        $this->xmlResponse = $xmlResponse;
    }


    /**
     * @return PPILead
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param PPILead $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     *
     * @return array
     */
    public function send()
    {
        $resultMessages = [];
        $url = $this->serverUrl;
	    //http://fastppicentre.co.uk
        $generatedXml = $this->generateXML();
        $headers = array(
            "Content-Type: application/x-www-form-urlencoded"
        );
        $post = http_build_query(
            array("XMLApplication" => $generatedXml)
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);



        $this->xmlrpc_call_success_blogger_newPost = 

        \Yii::info($response, 'bright_office');

        $reader = new \Sabre\Xml\Reader();
        $reader->xml($response);
        $result = $reader->parse();
        \Yii::info($result['value'], 'bright_office_result');
        $newXml = "<?xml version='1.0'?>" . $result['value'];
        $reader->xml($newXml);
        $result = $reader->parse();
        if (isset($result['value']) && isset($result['value'][0]) && isset($result['value'][0]['value']) && count($result['value'][0]['value']) >= 2) {
            // get result messsage
            foreach ($result['value'][0]['value'][1]['value'] as $currentError) {
                \Yii::info("Result message : " . $currentError['value'], 'bright_office_error');
                $resultMessages[] = $currentError['value'];
            }
        }
        curl_close($ch);

        /*extract the client code*/
        $resultMessages = implode(".", $resultMessages);
        $resultMessagesArr = explode(" ", $resultMessages);
        if (count($resultMessagesArr) === 1) {
            /*success*/
            $resultMessages = ltrim($resultMessages);
            $resultMessages = rtrim($resultMessages);
            $this->setClientCode($resultMessages);
        }
        return $resultMessages;
    }

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