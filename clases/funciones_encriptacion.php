<?php 
function getEncryptedPassword($password){
    define('METHOD','AES-256-CBC');
    define('SECRET_KEY','Tecnologico');
    define('SECRET_IV','990520');

    $output=FALSE;
    $key=hash('sha256', SECRET_KEY);
    $iv=substr(hash('sha256', SECRET_IV), 0, 16);
    $output=openssl_encrypt($password, METHOD, $key, 0, $iv);
    
    return base64_encode($output);
}

function getUnencryptedPassword ($encrypted){
    //Desencriptar la contraseña
    $key=hash('sha256', SECRET_KEY);
    $iv=substr(hash('sha256', SECRET_IV), 0, 16);
    
    return openssl_decrypt(base64_decode($encrypted), METHOD, $key, 0, $iv);
}

 ?>