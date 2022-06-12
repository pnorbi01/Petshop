<?php 
session_start();
require_once('assets/php/header.php');
require_once('config/db.php');
if (!isset($_SESSION['username']) OR !isset($_SESSION['id_user']) OR !is_int($_SESSION['id_user'])) {
    require_once('assets/php/nav-guest.php');
}
else {
    require_once('assets/php/nav.php');
}
$animalId = $_GET["animalId"];
?>
<div class="animal">
    <p>Válassz a kategóriáink közül</p>
    <div class="animal-container">
        <?php
		$sql = "SELECT * FROM species WHERE animalId = ".$animalId;
		$result = $conn->query($sql);
		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				?>
        <div class="animal-box">
            <a href="pets.php?animalId=<?= $animalId ?>&specieId=<?= $row["id"] ?>">
                <div class="animal-image">
                    <span class="animal-title"><?= $row["name"] ?></span>
                    <img src="assets/img/<?= $row["image"] ?>" alt="animal" width="150px" height="150px" />
                </div>
            </a>
        </div>
        <?php
			}
		}
	?>
    </div>
</div>
<?php
require_once('assets/php/footer.php');
?>
</body>

</html>