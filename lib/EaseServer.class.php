<?php
include_once 'Curl.class.php';
class EaseServer implements IEasemob {
    private static $org_name = 'xinyang-org';
    private $app_name;
    private $client_id;
    private $client_secret;

    public function __construct($app_name, $client_id, $client_secret){
        $this->app_name = $app_name;
        $this->client_id = $client_id;
        $this->client_secret = $client_secret;
    }

    protected function getToken(){
        $url = 'https://a1.easemob.com/' . self::$org_name . '/' . $this->app_name . '/token';
        $data = array('grant_type'=>'client_credentials','client_id'=>$this->client_id,'client_secret'=>$this->client_secret);
        $data = json_encode($data);
        $Curl = new Curl($url, $type);
        $Curl->createData($data);
        $Curl->execute();
        $Curl->content;
    }
}