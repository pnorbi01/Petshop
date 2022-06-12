<?php
session_start();
require_once('../config/db.php');
if(isset($_POST["fav"])) {

            $user = $_SESSION["id_user"];
            $id = $_POST["favourite"];

            $sql1 = "INSERT INTO favourites VALUES ('$user', '$id')";
            

            if($conn->query($sql1)) {
                header("Location: ". $_POST["url"]);
            }
            else {
                echo "Sikertelen";
            }
}
?>