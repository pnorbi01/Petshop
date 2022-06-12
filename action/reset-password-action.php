<?php
require_once('../config/db.php');
if(isset($_POST["resetPassSubmit"])) {
    if(isset($_POST["password"]) && !empty($_POST["password"]) && 
        isset($_POST["passwordConfirm"]) && !empty($_POST["passwordConfirm"]) &&
        $_POST["password"] === $_POST["passwordConfirm"] &&
        isset($_POST["userId"]) && !empty($_POST["userId"])) {

            $userId = $_POST["userId"];
            $newPassword = $_POST["passwordConfirm"];
            $newPasswordHashed = password_hash($newPassword, PASSWORD_DEFAULT);

            $sql = "UPDATE users_web SET password = '$newPasswordHashed' WHERE id_user = ". $userId;

            if($conn->query($sql)) {
                header("Location: ../login.php?f=13");
            }
            else {
                header("Location: ../login.php?f=10");
            }
    }
    else {
        header("Location: ../login.php?f=10");
    }
}

?>