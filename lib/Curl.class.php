<?php
class Curl {
    private $url;
    private $type;
    private $data;
    public $content;

    /**
     * 初始化
     * @param string $url
     * @param string $type
     */
    public function __construct($url, $type){
        $this->url = $url;
        $this->type = $type;
    }

    public function createData($data){
        $this->data = $data;
    }

    public function execute(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $this->type);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $this->content = curl_exec($ch);
        if($this->content === false){
        }
        curl_close($ch);
        $this->content = json_decode($this->content);
    }

    public function __toString(){}

    public function __destruct(){}
}