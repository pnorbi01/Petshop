<?php
session_start();
require_once('../config/db.php');
if(isset($_POST["modifyPass"])) {
    if(isset($_POST["newPassword"]) && !empty($_POST["newPassword"]) && 
        isset($_POST["newPasswordConfirm"]) && !empty($_POST["newPasswordConfirm"]) &&
        $_POST["newPassword"] === $_POST["newPasswordConfirm"]) {

            $newPassword = $_POST["newPasswordConfirm"];

            $newPasswordHashed = password_hash($newPassword, PASSWORD_DEFAULT);

            $sql1 = "UPDATE users_web SET password = '$newPasswordHashed' where username = '".$_SESSION["username"]."'";
            

            if($conn->query($sql1)) {
                $_SESSION["pass-msg"] = "succ";
                header("Location: ../edit-profile.php");
            }
            else {
                $_SESSION["pass-msg"] = "err";
                header("Location: ../edit-profile.php");
            }
    }
    else {
        $_SESSION["pass-msg"] = "err";
        header("Location: ../edit-profile.php");
    }
}

?>