<?php


$path = dirname(realpath(__FILE__)) . DIRECTORY_SEPARATOR . 'sessions';

session_save_path($path);

session_start(); 

var_dump($_SESSION);

// NOTE: mcrypt id DEPRECATED NOW
// openssl*() functions are the suitable alternatives
// echo mcrypt_module_get_algo_key_size(MCRYPT_BLOWFISH);
echo "<p>before</p>";
$key = 'WYCRYPT0K3Y@2020';
echo $enctpytedText = mcrypt_encrypt(MCRYPT_BLOWFISH, $key , 'Welcome to mu cryptography sessions', MCRYPT_MODE_ECB);
// echo $enctpytedText = openssl_get_cipher_methods();
echo "<p>after</p>";
echo mcrypt_decrypt(MCRYPT_BLOWFISH,$key,$enctpytedText, MCRYPT_MODE_ECB);

?> 