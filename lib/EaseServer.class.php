<?php
include 'Curl.class.php';
include 'IEasemob.class.php';
class EaseServer implements IEasemob {
    private $client_id;
    private $client_secret;
    private $url = 'https://a1.easemob.com/xinyang-org/';

    public function __construct($app_name, $client_id, $client_secret){
        $this->url .= $app_name;
        $this->client_id = $client_id;
        $this->client_secret = $client_secret;
    }

    public function getToken(){
        $url = $this->url . '/token';
        $data = array('grant_type'=>'client_credentials','client_id'=>$this->client_id,'client_secret'=>$this->client_secret);
        $Curl = new Curl($url, 'POST');
        $Curl->createData($data);
        $content = $Curl->execute();
        return $content['access_token'];
    }

    /**
     * 未涉及到数据库操作
     */
    public function putTokenOnFile(){
        $token = file_put_contents('./token.txt', $this->getToken());
    }

    protected function getTokenOnFile(){
        return file_get_contents('./token.txt');
    }

    public function regUserOnOpen($data){
        $url = $this->url . '/users';
        $Curl = new Curl($url, 'POST');
        $Curl->createData($data);
        return $Curl->execute();
    }

    public function regUserOnAuth($data){
        $url = $this->url . '/users';
        $auth = $this->getTokenOnFile();
        $header = array('Authorization: Bearer '.$auth);
        $Curl = new Curl($url, 'POST');
        $Curl->createData($data);
        $Curl->createHeader($header);
        return $Curl->execute();
    }

    public function __destruct(){}
}