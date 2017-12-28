<html>
<body>
<?php
	echo "Thank you for your submission ".$_POST["firstname"]; 

	$XML = "";
	$XML .= "<Application><Cases><Case>";
	
	$XML .= "<CreateCase>0</CreateCase>";

	$XML .= "<FirstName>".$_POST["firstname"]."</FirstName>";

	$XML .= "<LastName>".$_POST["surname"]."</LastName>";

	$XML .= "<HouseNumber>".$_POST["houseno"]."</HouseNumber>";
	$XML .= "<PostCode>".$_POST["postcode"]."</PostCode>";

	$XML .= "<SourceName>WebDemo</SourceName>";

	$XML .= "</Case></Cases></Application>";

	postXML($XML);
	
	
	
function postXML($XML){
	$url = "http://claimscrm.co.uk/XMLReceive.asmx/CaseApplication";
	
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
	
	$response = curl_exec($ch);
	
	curl_close($ch);
}

?>

</body>
</html>