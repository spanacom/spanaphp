<?php
require_once "api.php";
$spanacom = new Spanacom("YOUR_API_KEY");
try {
$params= array("to"=> "34638638638",
"from"=> "FROMSPA",
"text"=> "Hello world to msg");

$response=$spanacom->smsmt_send($params);
 echo "<br/><br/>SpanacomAPIOK:<br/>";
print_r($response);
} catch(Exception $e) {
echo "<br/><br/>SpanacomAPIerror:<br/>"; 
print_r($e);
}
?>
