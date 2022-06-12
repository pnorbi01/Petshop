<?php
session_start();
require_once('../config/db.php');
if(isset($_POST["give"])) {

            $user = $_SESSION["id_user"];
            $id = $_POST["giveAdmin"];

            $sql1 = "UPDATE users_web SET level = 2 WHERE id_user = ". $id;
            

            if($conn->query($sql1)) {
                header("Location: ../admin-console.php");
            }
            else {
                header("Location: ../admin-console.php");
            }
}
?>