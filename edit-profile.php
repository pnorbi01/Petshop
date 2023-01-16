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
?>

<?php
$sql = "SELECT * FROM users_web WHERE username = '".$_SESSION["username"]."'";
//majd AI legyen id users_webbe
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<div class="edit-profile-title">
    <h1>Profil adatainak szerkesztése</h1>
</div>
<hr style="width: 80%">
<div id="edit-profile-container">
    <div id="edit">
        <div id="edit-form">
            <div class="edit-main">
                <i class="fa">&#xf044;</i>
                <form method="post" id="editProfile" action="action/data-action.php">
                    <div style="display: flex; gap: 1em;">
                        <div style="width: 50%">
                            <label for="userName">FELHASZNÁLÓNÉV</label>
                            <input type="text" id="userName" name="editUserName" disabled value="<?= $row['username'] ?>">

                            <label for="fName">KERESZTNÉV</label>
                            <input type="text" id="fName" name="editFirstName" required value="<?= $row["firstname"] ?>">
                        </div>
                        <div style="width: 50%">
                            <label for="email">EMAIL</label>
                            <input type="email" id="email" name="editEmail" class="mainInput" required value="<?= $row["email"] ?>">

                            <label for="lName">VEZETÉKNÉV</label>
                            <input type="text" id="lName" name="editLastName" required value="<?= $row["lastname"] ?>">
                        </div>
                    </div>
                    <input type="submit" value="Adatok mentése" name="modify">
                    <?php
                        if(isset($_SESSION["data-msg"]) && $_SESSION["data-msg"] == "succ"){
                            echo '<div class="alertData"><span>Sikeresen megváltoztatta adatait!</span></div>';
                            unset($_SESSION["data-msg"]);
                        }
                        else if(isset($_SESSION["data-msg"]) && $_SESSION["data-msg"] == "err") {
                            echo '<div class="alertDataErr"><span>Valami hiba történt. Próbálja újra!</span></div>';
                            unset($_SESSION["data-msg"]);
                        }
                    ?>
                </form>
                <form method="post" id="editPassword" action="action/password-action.php">
                <i class="fa">&#xf023;</i>
                    <div style="display: flex; gap: 1em;">
                        <div style="width: 50%">
                            <label for="firstPassword">ÚJ JELSZÓ</label>
                            <input type="password" id="firstPassword" name="newPassword" required placeholder="Jelszó..">
                        </div>
                        <div style="width: 50%">
                            <label for="secondPassword">ÚJ JELSZÓ ISMÉT</label>
                            <input type="password" id="secondPassword" name="newPasswordConfirm" required placeholder="Jelszó ismét..">
                        </div>
                    </div>
                    <input type="submit" value="Jelszó megváltoztatása" name="modifyPass">
                    <?php
                        if(isset($_SESSION["pass-msg"]) && $_SESSION["pass-msg"] == "succ"){
                            echo '<div class="alertData"><span>Sikeresen megváltoztatta jelszavát!</span></div>';
                            unset($_SESSION["pass-msg"]);
                        }
                        else if(isset($_SESSION["pass-msg"]) && $_SESSION["pass-msg"] == "err") {
                            echo '<div class="alertDataErr"><span>Nem egyezik a jelszava!</span></div>';
                            unset($_SESSION["pass-msg"]);
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require_once('assets/php/footer.php');
?>