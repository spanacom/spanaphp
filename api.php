<?php
class Spanacom{
    private $apikey;
    private $debug = false;
    private $ch;
    public $root = 'https://accesosms.es/api/1.0';
    public function __construct($apikey=null) {
        
    $this->apikey=$apikey;
        $this->ch = curl_init();
        curl_setopt($this->ch, CURLOPT_USERAGENT, 'Spanacom-PHP/1.0.54');
        curl_setopt($this->ch, CURLOPT_POST, true);
        curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, false);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->ch, CURLOPT_HEADER, false);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($this->ch, CURLOPT_TIMEOUT, 600);
        
    register_shutdown_function(array($this,'destruct')); 
    
    
    }
    
    function destruct(){
    if(!empty($this->ch)){
    curl_close($this->ch);
    }
    }
    function __call($func, $params){
    //function __call($func, $params){
        //if(in_array($funcd, $this->array)){
            
            //print_r($params);
            
        
        $params['apikey'] = $this->apikey;
        $params = json_encode($params);
        $ch = $this->ch;
        $func = str_replace("_","/",$func);
        curl_setopt($ch, CURLOPT_URL, $this->root . '/'.$func . '.json');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_VERBOSE, $this->debug);
        
        $response_body = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if($httpcode== 200){
return json_decode($response_body);
}else{
        throw new Exception($response_body);
}
    }
}
?>
