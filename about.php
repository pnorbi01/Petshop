<?php
session_start();
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
<div id="about">
    <div class="about-title">
        <span>Tudj meg többet rólunk.</span>
    </div>
</div>
<div id="about-text">
    <div class="company-description">
        <h1><i style='font-size:37px' class='fas'>&#xf1b0;</i>Petadopt.</h1>
        <span>Vállalatunk 2021-ben alakult. Kiskedvencek örökbeadásával foglalkozunk.</span>
    </div>
</div>
<?php
require_once('assets/php/footer.php');
?>
</body>
</html>