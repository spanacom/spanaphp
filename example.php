<?php
require_once "api.php";
try {
$spanacom = new Spanacom("YOUR_API_KEY");
$params= array("to"=> "34638125683",
"from"=> "PUBLI",
"text"=> "Hola esto es un mensaje de prueba");

$response=$spanacom->smsmt_send($params);
if(!empty($response)){
echo '$response';
print_r($response);
}
} catch(Exception $e) {
echo "error:".$e; 
}
?>
