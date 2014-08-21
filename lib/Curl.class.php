<?php
class Curl {
    protected $url;
    protected $type;
    protected $data;
    protected $result;

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

    public function createCurl(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $this->type);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.2; rv:26.0) Gecko/20100101 Firefox/26.0');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        
        $this->result = curl_exec($ch);
        curl_close($ch);
    }
    
    public function __get($name){
        return $this->$name;
    }

    public function __toString(){
        return "url:$this->url,type:$this->type";
    }
}