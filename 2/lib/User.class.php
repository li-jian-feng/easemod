<?php
class User extends EaseServer {

    /**
     * 开放注册模式
     * @param array $data
     */
    public function regUserOnOpen($data){
        $Curl = new Curl($this->url . '/users', 'POST');
        $Curl->createData($data);
        return $Curl->execute();
    }

    /**
     * 授权注册模式
     * @param array $data
     */
    public function regUserOnAuth($data){
        $auth = $this->getTokenOnFile();
        $header = array('Authorization: Bearer ' . $auth);
        $Curl = new Curl($this->url . '/users', 'POST');
        $Curl->createHeader($header);
        $Curl->createData($data);
        return $Curl->execute();
    }

    /**
     * 批量创建用户 二维数组
     */
    public function regUserOnMulti(){
        $auth = $this->getTokenOnFile();
        $header = array('Authorization: Bearer ' . $auth);
        $Curl = new Curl($this->url . '/users', 'POST');
        $Curl->createHeader($header);
        $Curl->createData($data);
        return $Curl->execute();
    }

    /**
     * 获取用户信息
     * @param string username
     */
    public function getUserInfo($username){
        $url = $this->url . '/users/' . $username;
        $auth = $this->getTokenOnFile();
        $header = array('Authorization: Bearer ' . $auth);
        $Curl = new Curl($url, 'GET');
        $Curl->createHeader($header);
        return $Curl->execute();
    }

    /**
     * 重置用户密码
     */
    public function resetUserPassword($username, $password){
        $url = $this->url . '/' . $username . '/password';
        $auth = $this->getTokenOnFile();
        $header = array('Authorization: Bearer ' . $auth);
        $data = array('newpassword'=>$password);
        $Curl = new Curl($url, 'PUT');
        $Curl->createHeader($header);
        $Curl->createData($data);
        return $Curl->execute();
    }

    /**
     * 删除用户
     */
    public function deleteUser($username){
        $url = $this->url . '/users/' . $username;
        $auth = $this->getTokenOnFile();
        $header = array('Authorization: Bearer ' . $auth);
        $Curl = new Curl($url, 'DELETE');
        $Curl->createHeader($header);
        return $Curl->execute();
    }

    /**
     * 批量删除用户 没有制定具体删除哪些用户 可以在返回值中查看到哪些用户被删除掉了 可以通过增加查询条件来做到精确的删除
     * @package int $limit
     */
    public function deleteUserOnMulti($limit, $ql = ''){
        $url = $this->url . '/users?';
        if($ql){
            $url .= $ql;
        }else{
            $url .= '&limit=' . $limit;
        }
        $auth = $this->getTokenOnFile();
        $header = array('Authorization: Bearer ' . $auth);
        $Curl = new Curl($url, 'DELETE');
        $Curl->createHeader($header);
        return $Curl->execute();
    }

    /**
     * 给一个用户添加一个好友
     */
    public function addFriendToUser($username, $friendname){
        $url = $this->url . '/users/' . $username . '/contacts/users/' . $friendname;
        $auth = $this->getTokenOnFile();
        $header = array('Authorization: Bearer ' . $auth,'Content-Type: application/json');
        $Curl = new Curl($url, 'POST');
        $Curl->createHeader($header);
        return $Curl->execute();
    }

    /**
     * 删除一个用户的好友
     */
    public function deleteFriendOnUser(){}

    /**
     * 查看一个用户的所有好友
     */
    public function getFriendsOnUser(){}
}
?>