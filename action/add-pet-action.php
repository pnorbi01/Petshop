<?php
session_start();
require_once('../config/db.php');
if(isset($_POST["addPet"])) {

            $id = $_POST["allowPet"];

            $sql1 = "UPDATE pets SET active = 1 WHERE id = ".$id;
            

            if($conn->query($sql1)) {
                header("Location: ../admin-console.php");
            }
            else {
                echo "Sikertelen";
            }      
}
?>