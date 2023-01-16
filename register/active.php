<?php

require_once("assets/config/db_config.php");
require_once("assets/config/config.php");

if (isset($_GET['token'])){
    $token = mysqli_real_escape_string($connection, trim($_GET['token']));
}
    
if (!empty($token) AND strlen($token) === 40) {
    global $dsn, $pdoOptions;
    $pdo = connectDatabase($dsn, $pdoOptions);

    $sql = "UPDATE users_web SET active='1', token='', registration_expires=''
            WHERE  binary token = '$token' AND registration_expires>now()";

    $query = $pdo->prepare($sql);
    $query->bindParam(':token', $token, PDO::PARAM_STR);
    $query->execute();

    if ($query->rowCount() > 0) {
       redirection('login.php?r=6');
    }
    else {
        redirection('login.php?r=11');
    }
}
else {
    redirection('login.php?r=0');
}