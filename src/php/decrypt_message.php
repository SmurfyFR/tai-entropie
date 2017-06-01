<?php

set_include_path(get_include_path() . PATH_SEPARATOR . 'libs');
include(__DIR__.'/libs/Crypt/RSA.php');

if(stripos($_SERVER["CONTENT_TYPE"], "application/json") === 0) {
    $_POST = json_decode(file_get_contents("php://input"), true);
}
$message = (isset($_POST['msg']) ? $_POST['msg'] : "empty");

$rsa = new Crypt_RSA();
$rsa->loadKey(file_get_contents('keys/privatekey.pem'));

$decrypted_message = $rsa->decrypt(base64_decode($message));

echo json_encode([
    'decrypted_message' => $decrypted_message
]);
