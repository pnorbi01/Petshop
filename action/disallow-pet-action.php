<?php
session_start();
require_once('../config/db.php');
require_once('../register/config.php');
require_once('../register/functions_def.php');

if(isset($_POST["disPet"]) && isAdmin($_SESSION["id_user"])) {

            $id = $_POST["disallowPet"];

            $sql1 = "UPDATE pets SET active = 0 WHERE id = ".$id;
            

            if($conn->query($sql1)) {
                redirection(SITE."admin-console.php");
            }
            else {
                echo "Sikertelen";
            }      
} 
else {
    redirection(SITE."index.php");
}
?>