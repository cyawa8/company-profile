<?php
function encrypt($data, $key = 'secret-key')
{
    $method = 'aes-256-cbc';
    $iv = substr(hash('sha256', 'iv-secret'), 0, 16);
    $encrypted = openssl_encrypt($data, $method, $key, 0, $iv);
    return base64_encode($encrypted);
}

function decrypt($data, $key = 'secret-key')
{
    $method = 'aes-256-cbc';
    $iv = substr(hash('sha256', 'iv-secret'), 0, 16);
    return openssl_decrypt(base64_decode($data), $method, $key, 0, $iv);
}
