<?php
session_start();
require_once('../config/db.php');
require_once('../register/config.php');
require_once('../register/functions_def.php');

if(isset($_POST["deletePet"]) && isAuthenticated()) {

            $id = $_POST["delPet"];

            $sql1 = "DELETE FROM pets WHERE id = ".$id;
            

            if($conn->query($sql1)) {
                redirection(SITE."all-ad.php");
            }
            else {
                echo "Sikertelen";
            }
}
else {
    redirection(SITE."login.php");
}
?>