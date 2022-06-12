<?php 
session_start();

if (!isset($_SESSION['username']) OR !isset($_SESSION['id_user']) OR !is_int($_SESSION['id_user'])) {
    header("Location: login.php");
}

require_once('assets/php/header.php');
require_once('assets/php/nav.php');
require_once('config/db.php');

$petId = $_GET["petId"];
$animalId = $_GET["animalId"];

$sql = "SELECT pets.id, species.name as specie, pets.description, pets.image, pets.name, pets.gender, pets.age, pets.adopted FROM pets, species WHERE species.id = pets.specieId and pets.id = ".$petId; 
$result = $conn->query($sql);
$petResult = $result->fetch_assoc();

$sql = "SELECT * FROM animals WHERE id = ".$animalId;
$result = $conn->query($sql);
$animalResult = $result->fetch_assoc();

?>
<div id="adopt">
    <form method="post" id="adopt">
        <label for="salad">Kiválasztott állat</label>
        <input type="text" disabled value="<?= $petResult["name"] . ', ' .$petResult["specie"] ?>">
        <label for="lname">Vezetéknév*</label>
        <input type="text" id="lname" name="lname" required placeholder="Vezetékneve..">
        <label for="fname">Keresztnév*</label>
        <input type="text" id="fname" name="fname" required placeholder="Keresztneve..">
        <label for="email">EMAIL*</label>
        <input type="email" id="email" name="email" required placeholder="example@gmail.com">
        <label for="address">Lakcím*</label>
        <input type="text" id="address" name="address" required placeholder="Adja meg lakcímét">
        <input type="submit" value="Örökbefogadom" name="adopt">

        <?php
            if(isset($_POST["adopt"])) {
                if(isset($_POST["lname"]) && !empty($_POST["lname"]) && 
                    isset($_POST["fname"]) && !empty($_POST["fname"]) &&
                    isset($_POST["email"]) && !empty($_POST["email"]) &&
                    isset($_POST["address"]) && !empty($_POST["address"]) &&
                    $petResult["adopted"] != 0) {

            $firstname = $_POST["fname"];
            $lastname = $_POST["lname"];
            $email = $_POST["email"];
            $address = $_POST["address"];
            $user = $_SESSION["username"];
            $specie = $petResult["specie"];
            $name = $petResult["name"];

            $sql1 = "INSERT INTO adopts (user, pet_name, pet_specie, lastname, firstname, email, address) values ('$user', '$name', '$specie', '$lastname', '$firstname', '$email', '$address')";

            if ($conn->query($sql1) === TRUE) {
                echo '<div class="alertContact"><span>Sikeresen örökbefogadta: ' .$name. '</span></div>';
                $sql2 = "UPDATE pets SET adopted = 0 where pets.id = '$petId'";
                if($conn->query($sql2)){
                    echo "<meta http-equiv='refresh' content='2'>";
                }
            } 
            
              else {
                echo '<div class="alertContactErr"><span>Az alábbi kiskedvenc már örökbe lett fogadva!</span></div>';
              }

        }
        else {
            echo '<div class="alertContactErr"><span>Az alábbi kiskedvenc már örökbe lett fogadva!</span></div>';
            echo "<meta http-equiv='refresh' content='2'>";
          }
    }
?>

    </form>
</div>
</body>

</html>