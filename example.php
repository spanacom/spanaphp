<?
include("api.php");

$spanacom = new Spanacom('MIAPIKEY');

echo 'respuesta:<br><br>';
$response=$spanacom->smsmt_send(Array('to'=>'34638638638','from'=>'MyBusiness','text'=>'Hello world'));
print_r($response); // Testone

?>
