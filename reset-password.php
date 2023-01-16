<?php 
require_once('assets/php/header.php');
require_once('register/config.php');
require_once('register/functions_def.php');
require_once('config/db.php');

$token = $_GET["token"];
$userId;
$sql = "SELECT id_user FROM forgotpw WHERE token = '".$token."'";
$result = mysqli_query($connection, $sql);
deleteToken($token);
if (mysqli_num_rows($result) == 1) {
    $record = mysqli_fetch_array($result);
    $userId = $record["id_user"];
}
else {
    redirection('login.php?f=10');
}

?>
<div id="log-container">
    <div id="forgot-password">
        <div id="forgot-password-form">
            <div class="forgot-password-main">
                <i style='font-size:35px' class='fas'>&#xf577;</i>
                <form method="post" id="passwordRecovery" action="action/reset-password-action.php">
                    <label for="newPasswordRecovery">ÚJ JELSZÓ<span style="color: #CF2608">*</span></label>
                    <input type="password" id="newPasswordRecovery" name="password" required placeholder="Új jelszó..">

                    <label for="newPasswordRecoveryConfirm">ÚJ JELSZÓ ÚJRA<span style="color: #CF2608">*</span></label>
                    <input type="password" id="newPasswordRecoveryConfirm" name="passwordConfirm" required placeholder="Jelszó újra..">
                    
                    <input type="text" name="userId" hidden value="<?= $userId ?>" />

                    <input type="submit" value="Jelszó megváltoztatása" name="resetPassSubmit" id="resetPassSubmit">
                    <?php

            $f = 0;

            if (isset($_GET["f"]) and is_numeric($_GET['f'])) {
                $f = (int)$_GET["f"];

                if (array_key_exists($f, $messages)) {
                    echo '
                    <div class="alert" role="alert">
                        '.$messages[$f].'
                        <span class="closeAlert" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </span>
                    </div>
                    ';
                }
            }
            ?>
                </form>
            </div>
        </div>
    </div>
</div>