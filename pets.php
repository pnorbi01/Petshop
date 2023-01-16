<?php 
session_start();
require_once('assets/php/header.php');
require_once('config/db.php');
require_once('register/config.php');
require_once('register/functions_def.php');

if (!isAuthenticated()) {
    require_once('assets/php/nav-guest.php');
}
else {
    require_once('assets/php/nav.php');
}

$animalId = $_GET["animalId"];
$specieId = $_GET["specieId"];
$sql = "SELECT * FROM species where id = ".$specieId;
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if(isAuthenticated()) {
    $favoritesResult = $conn->query("SELECT pet_id FROM favourites WHERE user_id = ".$_SESSION["id_user"]);
    $ids_array = [];
    while($row = $favoritesResult->fetch_assoc())
    {
        $ids_array[] = $row['pet_id'];
    }
}
?>

<div class="card">
    <div class="card-container">
        <?php
		$sql = "SELECT pets.id, species.name as specie, pets.description, pets.image, pets.name, pets.gender, pets.age, pets.adopted, pets.active, pets.whose from pets, species where pets.specieId = ".$specieId." and species.id = pets.specieId and active = 1";
		$result = $conn->query($sql);
		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				?>
        <div class="card-content">
            <img src="assets/img/<?= $row["image"] ?>" alt="animal" width="150px" height="150px" /><br>
            <span style="font-size: 23px"><b><?= $row["name"] ?></b></span>
            <span class="pet-specie"><?= $row["specie"] ?></span>
            <span class="pet-description"><?= $row["description"] ?></span>
            <?php
                    if($row["adopted"] == 1) {
                    ?>
            <button type="button" onclick="openModal(<?= $row['id'] ?>)" class="infoButton">Részletek</button>
                <?php 
                    if(isAuthenticated() && in_array($row["id"], $ids_array)) {
                ?>
                <form method="post" action="action/unfav-action.php">
                    <input type="text" hidden value="<?= $row["id"] ?>" name="favourite">
                    <input type="text" hidden value="<?= $_SERVER["REQUEST_URI"] ?>" name="url">
                    <button name="fav"><i class="fas fa-heart"
                        style="font-size: 20px; color: #04AA6D;"></i></button>
                        </form>
                        <?php } else if (isAuthenticated()) { ?>
                            <form method="post" action="action/fav-action.php">
                    <input type="text" hidden value="<?= $row["id"] ?>" name="favourite">
                    <input type="text" hidden value="<?= $_SERVER["REQUEST_URI"] ?>" name="url">
                    <button name="fav"><i class="fas fa-heart"
                        style="font-size: 20px; color: #F00;"></i></button>
                        </form>
                        <?php }
                    
                    }
                    else {
                        ?>
                        <button type="button" class="infoButtonDis" disabled>Részletek</button>
                        <span class="adopted">ÖRÖKBEFOGADVA!</span>
            <?php }
                    ?>
            
        </div>


        <div class="bg-modal <?= "bg-modal-".$row['id'] ?>">
            <div class="modal-content">
                <div class="leftSide">
                    <img src="assets/img/<?= $row["image"] ?>" alt="animal" width="50%" height="70%" />
                </div>
                <div class="rightSide">
                    <span class="modalTitle">Fajta</span>
                    <span><?= $row["specie"] ?></span>
                    <span class="modalTitle">Név</span>
                    <span><?= $row["name"] ?></span>
                    <span class="modalTitle">Nem</span>
                    <span><?= $row["gender"] ?></span>
                    <span class="modalTitle">Kor</span>
                    <span><?= $row["age"] ?></span>
                    <span class="modalTitle">Leírás</span>
                    <span><?= $row["description"] ?></span>
                    <div class="modalButton">
                        <?php 
                        if(isAuthenticated()) { ?>
                            <a href="adopt.php?animalId=<?= $animalId ?>&petId=<?= $row["id"] ?>"><button type="submit"
                                    value="Submit" class="adoptButton">Örökbefogadás</button></a>
                        <?php } else { ?>
                            <a href="login.php"><button type="submit"
                                    value="Submit" class="adoptButton">Örökbefogadás</button></a>
                                    <?php
                        } ?>
                    </div>
                </div>
                <div class="close1" onclick="closeModal(event)">+</div>
            </div>
        </div>
        <script src="assets/js/modal.js"></script>
        <?php
                }
            /*else { 
                echo "<div class='no-result'><h1>Nincs találat!</h1></div>";
            }*/
            }
    ?>

    </div>
</div>

<?php
require_once('assets/php/footer.php');
?>
</body>

</html>