<?php
session_start();
require_once('../config/db.php');
require_once('../register/config.php');
require_once('../register/functions_def.php');

if(isset($_POST["fav"]) && isAuthenticated()) {

            $user = $_SESSION["id_user"];
            $id = $_POST["favourite"];

            $sql1 = "delete from favourites where user_id=".$user." and pet_id=".$id;
            

            if($conn->query($sql1)) {
                header("Location: ". $_POST["url"]);
            }
            else {
                echo "Sikertelen";
            }
} 
else {
    redirection(SITE."login.php");
}

?>