<?php

function __autoload($class){
    require_once './lib/' . $class . '.class.php';
}
$app_name = 'xinyang';
$client_id = 'YXA6bLWQMCnCEeSl4oHH89FGRg';
$client_secret = 'YXA6xZH8c5_a80Ik66kM7wOu0FeTr2g';
$User = new User($app_name, $client_id, $client_secret);
$data = array(
        array('username'=>'china111','password'=>'administrator'),
        array('username'=>'china222','password'=>'administrator')
);
// $info = $User->regUserOnAuth($data);
// $info = $User->getUserInfo('china111');
$ql = "ql=created> ".strtotime('2014-08-25 14:23:19')." and created < ".strtotime('2014-08-25 14:23:21');
// $info = $User->deleteUserOnMulti(10,urlencode($ql));
// $info = $User->addFriendToUser('china111', 'china666');
// $info = $User->deleteFriendOnUser('china111','china666');
// $info= $User->getFriendsOnUser('china111');

$Chat = new Chat($app_name, $client_id, $client_secret);
// $info = $Chat->chatFiles(realpath('./lib/test.jpeg'));
$info = $Chat->chatMessages();
var_dump($info);




