<?php

$publickey = file_get_contents('keys/publickey.pem');
echo json_encode([
    'publickey' => $publickey
]);
