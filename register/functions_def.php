<?php
require_once "db_config.php";

/**
 * Function redirects user to given url
 *
 * @param string $url
 */
function redirection($url)
{
    header("Location:$url");
    exit();
}

function isAuthenticated() {
    return isset($_SESSION['username']) && isset($_SESSION['id_user']) && is_int($_SESSION['id_user']);
}

/**
 * Function checks that login parameters exists in users_web table
 *
 * @param string $username
 * @param string $password
 * @return array
 */
function checkUserLogin($username, $enteredPassword)
{
    global $connection;

    $sql = "SELECT id_user, password, active FROM users_web 
            WHERE username = '$username' LIMIT 0,1";

    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    $data = [];

    if (mysqli_num_rows($result) > 0) {
        while ($record = mysqli_fetch_array($result)) {
            if($record["active"] != 1) {
                redirection(SITE."login.php?l=14");
            }
            $data['id_user'] = (int)$record['id_user'];
            $registeredPassword = $record['password'];
        }

        if (!password_verify($enteredPassword, $registeredPassword)) {
            $data = [];
        }
    }
    return $data;

}


/**
 * Function checks that user exists in users table
 *
 * @param $username
 * @return bool
 */
function existsUser($username)
{
    global $connection;

    $sql = "SELECT id_user FROM users_web
            WHERE username = '$username' AND (registration_expires>now() OR active ='1')";

    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    if (mysqli_num_rows($result) > 0)
        return true;
    else
        return false;
}


/**
 * Function registers user and returns id of created user
 *
 * @param $username
 * @param $password
 * @param $firstname
 * @param $lastname
 * @param $email
 * @param $code
 * @return int
 */
function registerUser($username, $password, $firstname, $lastname, $email, $token)
{

    global $connection;

    $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users_web (username,password,firstname,lastname,email,token,registration_expires,active)
             VALUES ('$username','$passwordHashed','$firstname','$lastname','$email','$token',DATE_ADD(now(),INTERVAL 1 DAY),0)";

    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    return mysqli_insert_id($connection);

}

/**
 * Function creates code with given length and returns it
 *
 * @param $length
 * @return string
 */
function createCode($length)
{
    $down = 97;
    $up = 122;
    $i = 0;
    $code = "";


    $div = mt_rand(3, 9);

    while ($i < $length) {
        if ($i % $div == 0)
            $character = strtoupper(chr(mt_rand($down, $up)));
        else
            $character = chr(mt_rand($down, $up));
        $code .= $character;
        $i++;
    }
    return $code;
}

/**
 * Function tries to send email with activation code
 *
 * @param $username
 * @param $email
 * @param $code
 * @return bool
 */
function sendData($username, $email, $token)
{

    $header = "From: PetAdopt <petadopt@petadopt.rs>\n";
    $header .= "X-Sender: petadopt@petadopt.rs\n";
    $header .= "X-Mailer: PHP/" . phpversion();
    $header .= "X-Priority: 1\n";
    $header .= "Reply-To:support@petadopt.rs\r\n";
    $header .= "Content-Type: text/html; charset=UTF-8\n";

    $url = SITE."register/active.php?token=$token";

    $message = "Data:\n\n user: $username \n \n www.vts.su.ac.rs";
    $message .= "\n\n to activate your account click on <a href='".$url."'>this</a> link to finalize your registration.";
    $to = $email;
    $subject = "Registration at PetAdopt";
    return mail($to, $subject, $message, $header);
}

/**
 * Function inserts data in database for e-mail sending failure
 *
 * @param $id_user_web
 */
function addEmailFailure($id_user_web)
{

    global $connection;

    $sql = "INSERT INTO user_email_failure (id_user_web, date_time_added)
             VALUES ('$id_user_web',now())";

    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

}

function insertToken($id, $token) {
    global $connection;
    $sql = "INSERT INTO forgotpw VALUES ('$id', '$token')";
    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
}

function sendPasswordRecoveryEmail($username, $email, $token)
{

    $header = "From: PetAdopt <petadopt@petadopt.rs>\n";
    $header .= "X-Sender: petadopt@petadopt.rs\n";
    $header .= "X-Mailer: PHP/" . phpversion();
    $header .= "X-Priority: 1\n";
    $header .= "Reply-To:support@petadopt.rs\r\n";
    $header .= "Content-Type: text/html; charset=UTF-8\n";

    $url = SITE . "reset-password.php?token=$token";

    $message = "Dear ".$username.",<br>Click on <a href='".$url."'>this</a> link to reset your password." ;
    $to = $email;
    $subject = "Forgotten password";
    return mail($to, $subject, $message, $header);
}

function deleteToken($token) {
    global $connection;

    $sql = "DELETE FROM forgotpw WHERE token = '".$token."'";
    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
}

function isAdmin($id) {
    global $connection;

    $sql = "SELECT level FROM users_web WHERE id_user = ".$id;
    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
    if (mysqli_num_rows($result) == 1) {
        $record = mysqli_fetch_array($result);
        return $record["level"] == 2;
    }
    else {
        return false;
    }
}