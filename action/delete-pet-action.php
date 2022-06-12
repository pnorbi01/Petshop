<?php
session_start();
require_once('../config/db.php');
if(isset($_POST["deletePet"])) {

            $id = $_POST["delPet"];

            $sql1 = "DELETE FROM pets WHERE id = ".$id;
            

            if($conn->query($sql1)) {
                header("Location: ../admin-console.php");
            }
            else {
                echo "Sikertelen";
            }
}
?>