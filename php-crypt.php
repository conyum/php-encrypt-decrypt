<?php

function swecrypt($in, $action) {
    $saltKey = "d63951607b5d7ed7b8082481be11bb71"; //Generate a new saltkey
    $secret_iv = "993f5cc51b847bc3d936feb5841048b8"; //Generate a new IV-key
    $out = false;
    $method = "AES-256-CBC";
    $key = hash('sha256', $saltKey);
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
 	if ($action == 'e') {
        $out = base64_encode(openssl_encrypt($in, $method, $key, 0, $iv));
    } 
    else if ($action == 'd') {
        $out = openssl_decrypt(base64_decode($in), $method, $key, 0, $iv);
    } 
    return $out; 
}
?>
