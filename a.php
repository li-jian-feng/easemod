<?php
//下列四项系统参数.根据自己后台相应内容修改
$org_name = 'org_name';
$app_name = 'app_name';
$client_id = 'client_id';
$client_secret = 'client_secret';

$easemob = new HXPlatform_WebRequest ();
//获取token , Token 活得一次 7天内有效. 
$access = $easemob->postRequest ( 'https://a1.easemob.com/' . $org_name . '/' . $app_name . '/token', 'grant_type=client_credentials&client_id=' . $client_id . '&client_secret=' . $client_secret );
$access = json_decode ( $access, true );
$access_token = $access ['access_token']; //获取access_token

$uid = 'aaaaaa'; //用户名
$pwd = 'aaaaaa'; //密码
/*
//注册用户
$acc_add = $easemob->postRequest ( 'https://a1.easemob.com/' . $org_name . '/' . $app_name . '/users', '{"username":"' . $uid . '","password":"' . $pwd . '"}', $access_token);
$acc_add = json_decode ( $acc_add, true );
print_r ( $acc_add );

$fuid='bbbbbb'; //好友用户名
//添加用户关系      这里参数{"username":"aaaaaa1","password":"aaaaaa1"} 为用户管理员账号密码 ,需要后台手动添加
$acc_contact = $easemob->postRequest ( 'https://a1.easemob.com/' . $org_name . '/' . $app_name . '/users/' . $uid . '/contacts/users/' . $fuid, '{"username":"aaaaaa","password":"aaaaaa"}', $access_token);
$acc_contact = json_decode ( $acc_contact, true );

print_r ( $acc_contact );

//批量删除用户
$acc_delete = $easemob->postRequest ( 'https://a1.easemob.com/' . $org_name . '/' . $app_name . '/users?limit=300', '', $access_token ,'DELETE');
$acc_delete = json_decode ( $acc_delete, true );
print_r ( $acc_delete );


//删除指定用户
$acc_delete_by_uid = $easemob->postRequest ( 'https://a1.easemob.com/' . $org_name . '/' . $app_name . '/users/' . $uid, '', $access_token, 'DELETE' );
$acc_delete_by_uid = json_decode ( $acc_delete_by_uid, true );
print_r ( $acc_delete_by_uid );
*/
$fuid='bbbbbb'; //好友用户名
//添加用户关系      这里参数{"username":"aaaaaa1","password":"aaaaaa1"} 为用户管理员账号密码 ,需要后台手动添加
$acc_contact = $easemob->postRequest ( 'https://a1.easemob.com/' . $org_name . '/' . $app_name . '/users/' . $uid . '/contacts/users/' . $fuid, '{"username":"aaaaaa","password":"aaaaaa"}', $access_token);
$acc_contact = json_decode ( $acc_contact, true );

print_r ( $acc_contact );
class HXPlatform_WebRequest {
	/**
	 * 发送URL请求
	 * @param  string $url     要发送到的地址
	 * @param  string $query   需要发送的参数。参数需要以a=1&b=2的形式传递。
	 * @return string
	 */
	public static function postRequest($url, $post_string = '', $Authorization = '', $type = 'POST') {
		$useragent = 'easemob.com API PHP5 Client 1.1 (curl) ' . phpversion ();
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_URL, $url );
		if (strlen ( $post_string ) >= 3) {
			curl_setopt ( $ch, CURLOPT_POSTFIELDS, $post_string );
		}
		if ($Authorization) {
			$header = array ('Authorization: Bearer ' . $Authorization );
			curl_setopt ( $ch, CURLOPT_HTTPHEADER, $header );
		}
		
		//curl_setopt($ch, CURLOPT_USERPWD, "username:password");
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt ( $ch, CURLOPT_USERAGENT, $useragent );
		curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, 10 );
		switch ($type) {
			case 'DELETE' :
				curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, "DELETE" );
				break;
			default :
				break;
		}
		curl_setopt ( $ch, CURLOPT_TIMEOUT, 30 );
		$result = curl_exec ( $ch );
		curl_close ( $ch );
		return $result;
	}
}
?>