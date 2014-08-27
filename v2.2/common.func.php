<?php

/**
 * 遍历对象转换为数组
 * @param object $obj
 */
function obj2arr($obj){
    $arr = is_object($obj) ? get_object_vars($obj) : $obj;
    if(is_array($arr)){
        return array_map('obj2arr', $arr);
    }else{
        return $arr;
    }
}

/**
 * 转换url字符串
 */
function url_enc($ql){
    $str = urlencode($ql);
    return str_replace('%2A', '*', $str);
}

/**
 * 自动载入
 * @param unknown $class
 */
function __autoload($class){
    require_once './lib/' . $class . '.class.php';
}