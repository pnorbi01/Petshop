<?php
session_start();
require_once('../config/db.php');
require_once('../register/config.php');
require_once('../register/functions_def.php');

if(isset($_POST["modify"]) && isAuthenticated()) {
    if(isset($_POST["editFirstName"]) && !empty($_POST["editFirstName"]) && 
        isset($_POST["editEmail"]) && !empty($_POST["editEmail"]) &&
        isset($_POST["editLastName"]) && !empty($_POST["editLastName"])) {

            $editFname = $_POST["editFirstName"];
            $editEmail = $_POST["editEmail"];
            $editLname = $_POST["editLastName"];

            $sql1 = "UPDATE users_web SET firstname = '$editFname', lastname = '$editLname', email = '$editEmail' where username = '".$_SESSION["username"]."'";
            

            if($conn->query($sql1)) {
                $_SESSION["data-msg"] = "succ";
                redirection(SITE."edit-profile.php");
            }
            else {
                $_SESSION["data-msg"] = "err";
                redirection(SITE."edit-profile.php");
            }
    }
    else {
        $_SESSION["data-msg"] = "err";
        redirection(SITE."edit-profile.php");
    }
} 
else {
    redirection(SITE."login.php");
}

?>