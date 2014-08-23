<?php

function _curl_request($url, $body, $header = array(), $method = CURLOPT_POST){
    array_push($header, 'Accept:application/json');
    array_push($header, 'Content-Type:application/json');
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, $method, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, 'SSTS Browser/1.0');
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
    if(isset($body{3}) > 0){
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    }
    if(count($header) > 0){
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    }
    $ret = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);
    clear_object($ch);
    clear_object($body);
    clear_object($header);
    if($err){
        return $err;
    }
    return json_decode($ret, true);
}