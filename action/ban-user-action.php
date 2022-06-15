<?php
session_start();
require_once('../config/db.php');
require_once('../register/config.php');
require_once('../register/functions_def.php');

if(isset($_POST["ban"]) && isAdmin($_SESSION["id_user"])) {

            $id = $_POST["banUser"];

            $sql1 = "UPDATE users_web SET active = -1 WHERE id_user = ". $id;
            

            if($conn->query($sql1)) {
                header("Location: ../admin-console.php");
            }
            else {
                header("Location: ../admin-console.php");
            }
}
else {
    redirection(SITE."index.php");
}
?>