<?php

$url 		= "http://www.claimscrm.co.uk"; // Your CRM's URL
$zipFile 	= '.\LOA.zip';  // This will usually be created on the fly but for this demo I created the zip manually

$xml 		= generateXML();
$byArray	= byArray($zipFile);
$result 	= postXML($url, $xml, $byArray);

var_dump($result);
	
	
function generateXML() {
	// Generate an example XML
	$xml = "";
	
	$xml .= "<Application><Cases><Case>";
	$xml .= "<CreateCase>1</CreateCase>"; // 1 = Create PotentialClaim
	$xml .= "<Title>Mr</Title>";
	$xml .= "<FirstName>James</FirstName>";
	$xml .= "<LastName>Kellett</LastName>";
	$xml .= "<HomeTelephone>0845 643 4012</HomeTelephone>";
	$xml .= "<Email>support@brightoffice.co.uk</Email>";

	$xml .= "<HouseNumber>1</HouseNumber>";
	$xml .= "<Address1>Maple Court Maple View</Address1>";
	$xml .= "<Address2>White Moss Business Park</Address2>";
	$xml .= "<Address3>Skelmersdale</Address3>";
	$xml .= "<Address4>Lancashire</Address4>";
	$xml .= "<PostCode>WN8 9TW</PostCode>";

	$xml .= "<CustomerStatus>CUSTOMER</CustomerStatus>";
	$xml .= "<OldReference>126354</OldReference>";
	
	$xml .= "<ClaimType>PPI-CLAIM</ClaimType>";
	$xml .= "<Provider>All in One Finance</Provider>";
	$xml .= "<AccountNumber>111111111</AccountNumber>";
	$xml .= "<SortCode>11-22-33</SortCode>";
	
	$xml .= "<Files>";
	$xml .= "	<Group>";
	$xml .= "		<Description>LOA</Description>";
	$xml .= "		<File>LOA.pdf</File>"; //This file is stored inside the zip file ($zipFile)
	$xml .= "	</Group>";
	$xml .= "</Files>";
	$xml .= "</Case></Cases></Application>";
	
	return $xml;
}
	
function byArray($zipFile) {
	// Create the byte array in the format the XMLReceive understands
	$fileName = $zipFile;
	
	if (file_exists($fileName)) {
		$data = "";
		$fp = fopen($fileName, "r");
		while (!feof($fp)) $data .= fread($fp,1024);
		fclose($fp);		
		
		$byArray = $data;
	} else {
		$byArray = NULL;
	}
	return $byArray;
}

function postXML($url, $xml, $byArray) {
/* 
	If you are getting an error "Class 'SoapClient' not found"....
	Locate php.ini in your apache bin folder, I.e Apache/bin/php.ini.
	Remove the ; from the beginning of extension=php_soap.dll. 
	Restart your Apache server. 
*/
	$soapclient = new SoapClient($url.'/XMLReceive.asmx?WSDL');
	$result = $soapclient->CaseApplicationZipped(array("XMLApplication" => $xml, "byArray" => $byArray));
	
	return $result;
}
	
?>