<?php
class Curl {
    private $url;
    private $type;
    private $data;
    private $ch;

    /**
     * 初始化
     * @param string $url
     * @param string $type 'GET'
     */
    public function __construct($url, $type = 'GET'){
        $this->url = $url;
        $this->type = $type;
        $this->ch = curl_init();
    }

    /**
     * 创建提交的数据
     * @param array $data
     * @param string $type 'json'
     */
    public function createData($data, $type = 'json'){
        if($type == 'json'){
            $data = json_encode($data);
        }
        $this->data = $data;
    }

    /**
     * 设置Header
     * @param string $str
     */
    public function createHeader($header){
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, $header);
    }

    public function execute(){
        curl_setopt($this->ch, CURLOPT_URL, $this->url);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, $this->type);
        curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, $this->data);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
        $this->content = json_decode(curl_exec($this->ch));
        curl_close($this->ch);
        return (array)$this->content;
    }

    public function __toString(){}

    public function __get($name){
        return $this->$name;
    }
}