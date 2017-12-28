<?php

// This URL will need to be updated to your CRM
$url = "http://www.claimscrm.co.uk/XMLReceive.asmx/CaseApplication";

function generateXML() {
	//Generate the XML string
	$XML = "";
	$XML .= "<Application><Cases><Case>";
	$XML .= "<CreateCase>0</CreateCase>";

	$XML .= "<Title>Mr</Title>";
	$XML .= "<FirstName>Bobby</FirstName>";
	$XML .= "<LastName>Brightoffice</LastName>";
   
	$XML .= "<HouseNumber>1b</HouseNumber>";
	$XML .= "<HouseName></HouseName>";
	$XML .= "<Address1>Maple Court Maple View </Address1>";
	$XML .= "<Address2>White Moss Business Park</Address2>";
	$XML .= "<Address3>Skelmersdale</Address3>";
	$XML .= "<Address4>West Lancashire</Address4>";
	$XML .= "<PostCode>WN8 9TW</PostCode>";
   
	$XML .= "<HomeTelephone>0845 643 4012</HomeTelephone>";
	$XML .= "<MobileTelephone></MobileTelephone>";
	$XML .= "<Email>support@brightoffice.co.uk</Email>";

	$XML .= "<Notes></Notes>";

	$XML .= "<SourceName></SourceName>";
	$XML .= "<SourceAffName></SourceAffName>";

	$XML .= "<CustomerType></CustomerType>";

	$XML .= "</Case></Cases></Application>";
	
	return $XML;
}

function postXML($url, $XML){
	//Create the curl request
	$headers = array(
		"Content-Type: application/x-www-form-urlencoded"
	);
   
	$post = http_build_query(
		array("XMLApplication" => $XML)
	);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
	//Capture the return value
	$response = curl_exec($ch);
	
	curl_close($ch);
	
	//Display the XML used & the return value
	echo "Generated XML<br /><textarea rows=\"20\" cols=\"100\">".$XML."</textarea>";
	echo "<br /><br />Response:<br /><textarea rows=\"6\" cols=\"100\">".$response."</textarea>";
}

//Call the post function with the generated XML
postXML($url, generateXML());

?>