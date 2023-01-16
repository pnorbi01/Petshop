<?php
session_start();
require_once('config/db.php');
require_once('register/config.php');
require_once('register/functions_def.php');

if (!isAuthenticated()) {
    redirection(SITE. "login.php");
}
require_once('assets/php/header.php');
require_once('assets/php/nav.php');


$sql = "SELECT * FROM species WHERE animalId = 2";
$dogSpecies = $conn->query($sql);

$sql1 = "SELECT * FROM species WHERE animalId = 1";
$catSpecies = $conn->query($sql1); 

$sql2 = "SELECT * FROM users_web";
$users = $conn->query($sql2);


?>
<div class="add-title">
    <h1>HÍRDETÉS FELADÁSA</h1>
</div>
<div id="adding-new_pet">
    <h3>KUTYA</h3>
    <form method="post" action="action/dog-posting.php">
        <label for="image">KÉP<span style="color: #CF2608">*</span></label><br>
        <input type="text" id="image" name="image" placeholder="Kiskedvence képe"><br>
        <label for="name">NÉV<span style="color: #CF2608">*</span></label><br>
        <input type="text" id="name" name="name" placeholder="Kiskedvenc neve"><br>
        <label for="description">LEíRÁS<span style="color: #CF2608">*</span></label><br>
        <input type="text" id="description" name="description" placeholder="Vigye be a házikedvence leírását"><br>
        <label for="animal">FAJTA<span style="color: #CF2608">*</span></label>
        <select name="specie" id="specie">
            <?php
                while($row = $dogSpecies->fetch_assoc()) {
                ?>
                <option value="<?= $row["id"] ?>"><?= $row["name"] ?></option>
                <?php
                }
            ?>
        </select> 
        <label for="age">ÉV<span style="color: #CF2608">*</span></label><br>
        <input type="number" id="age" name="age"><br>
        <label for="gender">NEM<span style="color: #CF2608">*</span></label><br>
        <select name="gender" id="gender">
            <option value="fiu">Fiú</option>
            <option value="lany">Lány</option>
        </select>
        <button type="submit" name="sbDog" value="add">FELADÁS</button>
        <?php
            if(isset($_SESSION["adDog-msg"]) && $_SESSION["adDog-msg"] == "succ"){
                echo '<div class="alertData"><span>Sikeresen feladta kutyáját!</span></div>';
                unset($_SESSION["adDog-msg"]);
            }
            else if(isset($_SESSION["adDog-msg"]) && $_SESSION["adDog-msg"] == "err") {
                echo '<div class="alertDataErr"><span>Valami hiba történt a feladás közben. Próbálja újra!</span></div>';
                unset($_SESSION["adDog-msg"]);
            }
        ?>
    </form>
    <h3>MACSKA</h3>
    <form method="post" action="action/cat-posting.php">
        <label for="image">KÉP<span style="color: #CF2608">*</span></label><br>
        <input type="text" id="image" name="image" placeholder="Kiskedvence képe"><br>
        <label for="name">NÉV<span style="color: #CF2608">*</span></label><br>
        <input type="text" id="name" name="name" placeholder="Kiskedvenc neve"><br>
        <label for="description">LEíRÁS<span style="color: #CF2608">*</span></label><br>
        <input type="text" id="description" name="description" placeholder="Vigye be a házikedvence leírását"><br>
        <label for="animal">FAJTA<span style="color: #CF2608">*</span></label>
        <select name="specie" id="specie">
            <?php
                while($row = $catSpecies->fetch_assoc()) {
                ?>
                <option value="<?= $row["id"] ?>"><?= $row["name"] ?></option>
                <?php
                }
            ?>
        </select> 
        <label for="age">ÉV<span style="color: #CF2608">*</span></label><br>
        <input type="number" id="age" name="age"><br>
        <label for="gender">NEM<span style="color: #CF2608">*</span></label><br>
        <select name="gender" id="gender">
            <option value="Fiú">Fiú</option>
            <option value="Lány">Lány</option>
        </select>
        <button type="submit" name="sbCat" value="add">FELADÁS</button>
        <?php
            if(isset($_SESSION["adCat-msg"]) && $_SESSION["adCat-msg"] == "succ"){
                echo '<div class="alertData"><span>Sikeresen feladta cicáját!</span></div>';
                unset($_SESSION["adCat-msg"]);
            }
            else if(isset($_SESSION["adCat-msg"]) && $_SESSION["adCat-msg"] == "err") {
                echo '<div class="alertDataErr"><span>Valami hiba történt a feladás közben. Próbálja újra!</span></div>';
                unset($_SESSION["adCat-msg"]);
            }
        ?>
    </form>
</div>
<div class="all-ad">
    <a href="all-ad.php"><button type="submit" name="allAd" value="allAd">HÍRDETÉSEIM MEGTEKINTÉSE</button></a>
</div>
<?php
require_once('assets/php/footer.php');
?>
</body>
</html>