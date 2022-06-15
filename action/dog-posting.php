<?php
session_start();
require_once('../config/db.php');
require_once('../register/config.php');
require_once('../register/functions_def.php');

if(isset($_POST["sbDog"]) && isAuthenticated()) {
    if(isset($_POST["image"]) && !empty($_POST["image"]) && 
        isset($_POST["name"]) && !empty($_POST["name"]) &&
        isset($_POST["description"]) && !empty($_POST["description"]) &&
        isset($_POST["age"]) && !empty($_POST["age"]) &&
        isset($_POST["gender"]) && !empty($_POST["gender"]) &&
        isset($_POST["specie"]) && !empty($_POST["specie"])) {

            $image = $_POST["image"];
            $name = $_POST["name"];
            $description = $_POST["description"];
            $age = $_POST["age"];
            $gender = $_POST["gender"];
            $specie = $_POST["specie"];
            $user = $_SESSION["username"];

            $sql1 = "INSERT INTO pets (specieId, whose, name, description, image, gender, age) values ('$specie', '$user', '$name', '$description', '$image', '$gender', '$age')";
            

            if($conn->query($sql1) === TRUE) {
                $_SESSION["adDog-msg"] = "succ";
                redirection(SITE."ad-posting.php");
            }
            else {
                $_SESSION["adDog-msg"] = "err";
                redirection(SITE."ad-posting.php");
            }

    }
    else {
        $_SESSION["adDog-msg"] = "err";
        redirection(SITE."ad-posting.php");
    }
}
else {
    redirection(SITE."login.php");
}
?>