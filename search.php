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

if(isAuthenticated()) {
    $favoritesResult = $conn->query("SELECT pet_id FROM favourites WHERE user_id = ".$_SESSION["id_user"]);
    $ids_array = [];
    while($row = $favoritesResult->fetch_assoc())
    {
        $ids_array[] = $row['pet_id'];
    }
}

if(isset($_GET["search"]) && !empty($_GET["search"])) {
    $search = "%".$_GET["search"]."%";
    $sql = "SELECT pets.id, species.name as specie, pets.description, pets.image, pets.name, pets.gender, pets.age, pets.adopted, animals.id as animalId, pets.active FROM pets, species, animals where (species.name like '$search' and species.id = pets.specieId and animals.id = species.animalId and pets.active = 1) or (pets.name like '$search' and pets.specieId = species.id and animals.id = species.animalId and pets.active = 1)";
    $result = $conn->query($sql);

    ?>
<div class="card">
    <div class="card-container">
        <?php
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
            <?php  
            }
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
                            <a href="adopt.php?animalId=<?= $row["animalId"] ?>&petId=<?= $row["id"] ?>"><button type="submit"
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
}
else {
    echo "<h1>Nincs találat!</h1>";
}
}
else {
?>
        <?php
    echo "<h1>Nincs találat!</h1>";
    ?>
    </div>
</div>
</body>

</html>
<?php
}