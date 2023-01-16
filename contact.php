<?php 
session_start();
require_once('config/db.php');
require_once('assets/php/header.php');
require_once('register/config.php');
require_once('register/functions_def.php');

if (!isAuthenticated()) {
    require_once('assets/php/nav-guest.php');
}
else {
    require_once('assets/php/nav.php');
}
?>

<?php 
$sql = "select * from contact_question";
$restaurants = $conn->query($sql);
?>

<div id="contact">
    <div class="contact-title">
        <span>Lépj velünk kapcsolatba</span>
    </div>
</div>
<div id="contact-form">
    <form method="post" id="contactId" action="action/contact-action.php">
        <label for="fname">Keresztneve<span style="color: #CF2608">*</span></label>
        <input type="text" id="fname" name="firstname" required placeholder="Keresztneve..">

        <label for="lname">Vezetékneve<span style="color: #CF2608">*</span></label>
        <input type="text" id="lname" name="lastname" required placeholder="Vezetékneve..">

        <label for="email">EMAIL<span style="color: #CF2608">*</span></label>
        <input type="email" id="email" name="email" required placeholder="example@gmail.com">

        <label for="question">Kérdés<span style="color: #CF2608">*</span></label>
        <select id="question" name="question">
            <option selected disabled>Miben segíthetünk?</option>
            <?php
                while($row = $restaurants->fetch_assoc()) {
                ?>
            <option value="<?= $row["question_id"] ?>"><?= $row["question"] ?></option>
            <?php
                }
            ?>
        </select>

        <label for="message">Üzenet<span style="color: #CF2608">*</span></label>
        <textarea id="message" name="message" required placeholder="Irja le üzenetét.."></textarea>

        <input type="submit" value="Elküld" name="sb">
        <?php
        if(isset($_SESSION["contact-msg"]) && $_SESSION["contact-msg"] == "succ"){
            echo '<div class="alertContact"><span>Sikeresen rögzítettük kérdésed!</span></div>';
            unset($_SESSION["contact-msg"]);
        }
        else if(isset($_SESSION["contact-msg"]) && $_SESSION["contact-msg"] == "err") {
            echo '<div class="alertContactErr"><span>Valami hiba történt. Próbálja újra!</span></div>';
            unset($_SESSION["contact-msg"]);
        }
        ?>
    </form>
</div>

<?php
require_once('assets/php/footer.php');
?>
</body>

</html>