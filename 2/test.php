<?php
function __autoload($class){
    require_once './lib/'.$class.'.class.php';
}
$app_name = 'xinyang';
$client_id = 'YXA6bLWQMCnCEeSl4oHH89FGRg';
$client_secret = 'YXA6xZH8c5_a80Ik66kM7wOu0FeTr2g';
$User = new User($app_name, $client_id, $client_secret);
// 注册用户
$data = array(
        array('username'=>'china777','password'=>'administrator'),
        array('username'=>'china888','password'=>'administrator'),
        array('username'=>'china999','password'=>'administrator')
);
// $info = $User->regUserOnAuth($data);
//获取用户信息
// $info = $User->getUserInfo('china111');
$info = $User->addFriendToUser('china111', 'china222');
var_dump($info);




