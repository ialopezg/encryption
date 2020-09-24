<?php

require '../vendor/autoload.php';

$password = 'The1@ngel';

// Display the original string
echo "Original password: <strong>{$password}</strong><br>";

$key = \ialopezg\Libraries\Encryption\Password::createKey(8);
$encrypter = new \ialopezg\Libraries\Encryption\Password([
    'cipher' => 'AES-128-CTR',
    'digest' => 'SHA512',
    'options' => OPENSSL_CIPHER_RC2_40,
    'key' => $key
]);
$encrypter->setOption('key', $key);
$encrypted_password = $encrypter->hash($password);
// Display the encrypted string
echo "Encrypted password: <strong>{$encrypted_password}</strong><br>";

// Display the encrypted string
echo 'Password are equals: <strong>' . ($encrypter->verify($password, $encrypted_password) ? 'true' : 'false') . '</strong>';