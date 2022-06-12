<?php 
require_once('assets/php/header.php');
require_once('register/config.php');
require_once('assets/php/nav-guest.php');
?>
<div id="log-container">
    <div id="sign-up">
        <div id="sign-up-form">
            <div class="sign-up-main">
                <i class="fa">&#xf2b5;</i>
                <form method="post" id="signup" action="register/web.php">
                    <div style="display: flex; gap: 1em;">
                        <div style="width: 50%">
                            <label for="userName">FELHASZNÁLÓNÉV<span style="color: #CF2608">*</span></label>
                            <input type="text" id="userName" name="username" required placeholder="Felhasználónév..">

                            <label for="fName">KERESZTNÉV<span style="color: #CF2608">*</span></label>
                            <input type="text" id="fName" name="firstname" required placeholder="Keresztnév..">

                            <label for="lName">VEZETÉKNÉV<span style="color: #CF2608">*</span></label>
                            <input type="text" id="lName" name="lastname" required placeholder="Vezetéknév..">
                        </div>
                        <div style="width: 50%">
                            <label for="email">EMAIL<span style="color: #CF2608">*</span></label>
                            <input type="email" id="email" name="email" class="mainInput" required placeholder="example@gmail.com">

                            <label for="firstPassword">JELSZÓ<span style="color: #CF2608">*</span></label>
                            <input type="password" id="firstPassword" name="password" required placeholder="Jelszó..">

                            <label for="secondPassword">JELSZÓ ISMÉT<span style="color: #CF2608">*</span></label>
                            <input type="password" id="secondPassword" name="passwordConfirm" required placeholder="Jelszó ismét..">
                        </div>
                    </div>
                    <input type="hidden" name="action" value="register">
                    <input type="submit" value="Regisztráció">
                    <?php
            $r = 0;

            if (isset($_GET["r"]) and is_numeric($_GET['r'])) {
                $r = (int)$_GET["r"];

                if (array_key_exists($r, $messages)) {
                    echo '
                    <div class="alert" role="alert">
                        '.$messages[$r].'
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
    <div id="sign-in">
        <div id="sign-in-form">
            <div class="sign-in-main">
                <i style='font-size:35px' class='fas'>&#xf2f6;</i>
                <form method="post" id="signin" action="register/web.php">
                    <label for="userName">FELHASZNÁLÓNÉV</label>
                    <input type="text" id="userName" name="username" required placeholder="Felhasználónév..">

                    <label for="password">JELSZÓ</label>
                    <input type="password" id="password" name="password" class="mainInput" required placeholder="Jelszó..">
                    <input type="hidden" name="action" value="login">
                    <input type="submit" value="Bejelentkezés">
                    <?php

            $l = 0;

            if (isset($_GET["l"]) and is_numeric($_GET['l'])) {
                $l = (int)$_GET["l"];

                if (array_key_exists($l, $messages)) {
                    echo '
                    <div class="alert" role="alert">
                        '.$messages[$l].'
                        <span class="closeAlert" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </span>
                    </div>
                    ';
                }
            }
            ?>
                </form>
                <span id="resetSpan">Elfelejtett jelszó esetén</span>
                <form action="register/web.php" method="post" name="forget" id="forget">
                    <div class="reset-pw">
                        <label for="forgetEmail">EMAIL<span style="color: #CF2608">*</span></label>
                        <input type="email" id="forgetEmail" placeholder="Írja be e-mail-jét" name="email">
                    </div>
                    <input type="hidden" name="action" value="forget">
                    <input type="submit" value="Jelszó újrakérése">
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
</body>

</html>