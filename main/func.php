<!-- random string for chatroom code -->
<?php

    define("ENC_FILE_NAME", "enc_key.txt");

function getEncKey() {
    $encKey = file_get_contents(ENC_FILE_NAME);//retrieve existing key

    //generate and store key in txt file if not present
    if (is_null($encKey) || empty($encKey)) {
        $encKey = openssl_random_pseudo_bytes(32); // Generate key
        file_put_contents(ENC_FILE_NAME, $encKey);
    }

    return $encKey;
}

function randomString($n)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str = '';
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $str .= $characters[$index];
    }

    return $str;
}
function encryptMessage($message, $key) {
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($message, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
    return base64_encode($iv . $encrypted);
}
function decryptMessage($encryptedMessage, $key) {
    $data = base64_decode($encryptedMessage);
    $iv = substr($data, 0, openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = substr($data, openssl_cipher_iv_length('aes-256-cbc'));
    return openssl_decrypt($encrypted, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
}


