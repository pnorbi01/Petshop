<?php
session_start();
require_once('../config/db.php');
if(isset($_POST["sb"])) {
                if(isset($_POST["firstname"]) && !empty($_POST["firstname"]) && 
                    isset($_POST["lastname"]) && !empty($_POST["lastname"]) &&
                    isset($_POST["email"]) && !empty($_POST["email"]) &&
                    isset($_POST["question"]) && !empty($_POST["question"]) &&
                    isset($_POST["message"]) && !empty($_POST["message"])) {

            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $email = $_POST["email"];
            $question = $_POST["question"];
            $message = $_POST["message"];
            $user = $_SESSION["username"];

            $sql1 = "INSERT INTO contacts (question_id, user, firstname, lastname, email, text) values ('$question', '$user', '$firstname', '$lastname', '$email', '$message')";

            if ($conn->query($sql1) === TRUE) {
                $_SESSION["contact-msg"] = "succ";
                header("Location: ../contact.php");
            } 
            else {
                $_SESSION["contact-msg"] = "err";
                header("Location: ../contact.php");
            }
        }
        else {
            $_SESSION["contact-msg"] = "err";
            header("Location: ../contact.php");
        }
}
?>