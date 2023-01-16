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
?>
<div class="animal">
    <p>Válassz különböző állatok közül</p>
    <div class="animal-container">
        <?php
		$sql = "SELECT * FROM animals";
		$result = $conn->query($sql);
		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				?>
        <div class="animal-box">
            <a href="species.php?animalId=<?= $row["id"] ?>">
                <div class="animal-image">
                    <span class="animal-title"><?= $row["name"] ?></span>
                    <img src="assets/img/<?= $row["image"] ?>" alt="animal" width="350px" height="350px" />
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