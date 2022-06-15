<?php
session_start();
require_once('../config/db.php');
require_once('../register/config.php');
require_once('../register/functions_def.php');

if(isset($_POST["takeaway"]) && isAdmin($_SESSION["id_user"])) {

            $user = $_SESSION["id_user"];
            $id = $_POST["takeAwayAdmin"];

            $sql1 = "UPDATE users_web SET level = 1 WHERE id_user = ". $id;
            

            if($conn->query($sql1)) {
                redirection(SITE."admin-console.php");
            }
            else {
                redirection(SITE."admin-console.php");
            }
}
else {
    redirection(SITE."index.php");
}
?>