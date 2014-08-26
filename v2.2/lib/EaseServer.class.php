<?php
class EaseServer {
    protected $client_id;
    protected $client_secret;
    protected $url = 'https://a1.easemob.com/xinyang-org/';

    public function __construct($app_name, $client_id, $client_secret){
        $this->url .= $app_name;
        $this->client_id = $client_id;
        $this->client_secret = $client_secret;
    }

    /**
     * 从ease服务器上获取access_oken
     */
    protected function getToken(){
        $data = array('grant_type'=>'client_credentials','client_id'=>$this->client_id,'client_secret'=>$this->client_secret);
        $Curl = new Curl($this->url . '/token', 'POST');
        $Curl->createData($data);
        $content = $Curl->execute();
        return $content['access_token'];
    }

    /**
     * 将Token写入到文件中
     */
    protected function putTokenOnFile(){
        file_put_contents('./token.txt', $this->getToken());
    }

    /**
     * 获取文件中的Token
     * @return string
     */
    protected function getTokenOnFile(){
        return file_get_contents('./token.txt');
    }
}
?>