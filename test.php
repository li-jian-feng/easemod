<?php
include_once './lib/EaseServer.class.php';
$app_name = 'xinyang';
$client_id = 'YXA6bLWQMCnCEeSl4oHH89FGRg';
$client_secret = 'YXA6xZH8c5_a80Ik66kM7wOu0FeTr2g';
$Ea = new EaseServer($app_name, $client_id, $client_secret);
// $content = $Ea->regUserOnOpen(array('username'=>'china888','password'=>'administrator'));

// $content = $Ea->regUserOnAuth(array('username'=>'china889','password'=>'administrator'));

$data = array(array('username'=>'china111','password'=>'admin'));
$content = $Ea->regUserOnMulti($data);
var_dump($content);