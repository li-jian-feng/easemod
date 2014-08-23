<?php

function get_token(){
    $org_name = 'xinyang-org';
    $app_name = 'xinyang';
    $client_id = 'YXA6bLWQMCnCEeSl4oHH89FGRg';
    $client_secret = 'YXA6xZH8c5_a80Ik66kM7wOu0FeTr2g';
    $data = array('grant_type'=>'client_credentials','client_id'=>$client_id,'client_secret'=>$client_secret);
    $data = json_encode($data);
    var_dump($data);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://a1.easemob.com/$org_name/$app_name/token");
    // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $content = curl_exec($ch);
    if($content === false){
        echo 'error:' . curl_error($ch);
        // echo '<br>errno:' . curl_errno($ch);
    }else{
        // var_dump($content);
    }
    // var_dump($content);
    curl_close($ch);
}
get_token();