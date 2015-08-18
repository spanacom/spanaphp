<?php
require_once "api.php";
try {
$spanacom = new Spanacom("YOUR_API_KEY");
$params= array("to"=> "34638638638",
"from"=> "FROMSPA",
"text"=> "Hello world to msg");

$response=$spanacom->smsmt_send($params);
print_r($response);
} catch(Exception $e) {
echo "SpanacomAPIerror:".$e; 
}
?>
