<?php
class Chat extends EaseServer {

    /**
     * 上传文件
     * @param string $file
     * @return array
     */
    public function chatFiles($file){
        $auth = $this->getTokenOnFile();
        $data = "@" . $file;
        $header[] = 'Authorization: Bearer ' . $auth;
        $header[] = 'restrict-access: true';
        $header[] = 'Content-Type: application/json';
        $Curl = new Curl($this->url . '/chatfiles', 'POST');
        $Curl->createHeader($header);
        $Curl->createData($data);
        return $Curl->execute();
    }
    
    /**
     * 下载图片,语音文件
     */
    public function downloadFile(){}
    
    /**
     * 下载缩略图
     */
    public function downloadThumb(){}
    
    /**
     * 获取最新的聊天记录
     * @return array
     */
    public function getMessagesByNewest(){
        $auth = $this->getTokenOnFile();
        $header[] = 'Authorization: Bearer ' . $auth;
        $url = $this->url.'/chatmessages?ql'.urlencode('order+by+timestamp+desc&limit=20');
        $Curl = new Curl($url,'GET');
        $Curl->createHeader($header);
        return $Curl->execute();
    }
    
    /**
     * 获取某个时间段内的消息
     */
    public function getMessagesByTimes(){}
    
    /**
     * 分页获取数据
     */
    public function getMessagesByPage(){}
}