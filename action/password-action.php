<?php
session_start();
require_once('../config/db.php');
require_once('../register/config.php');
require_once('../register/functions_def.php');

if(isset($_POST["modifyPass"]) && isAuthenticated()) {
    if(isset($_POST["newPassword"]) && !empty($_POST["newPassword"]) && 
        isset($_POST["newPasswordConfirm"]) && !empty($_POST["newPasswordConfirm"]) &&
        $_POST["newPassword"] === $_POST["newPasswordConfirm"]) {

            $newPassword = $_POST["newPasswordConfirm"];

            $newPasswordHashed = password_hash($newPassword, PASSWORD_DEFAULT);

            $sql1 = "UPDATE users_web SET password = '$newPasswordHashed' where username = '".$_SESSION["username"]."'";
            

            if($conn->query($sql1)) {
                $_SESSION["pass-msg"] = "succ";
                redirection(SITE."edit-profile.php");
            }
            else {
                $_SESSION["pass-msg"] = "err";
                redirection(SITE."edit-profile.php");
            }
    }
    else {
        $_SESSION["pass-msg"] = "err";
        redirection(SITE."edit-profile.php");
    }
}
else {
    redirection(SITE."login.php");
}

?>