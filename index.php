<?php 
session_start();
require_once('register/config.php');
require_once 'register/functions_def.php';
require_once 'register/db_config.php';
require_once('assets/php/header.php');

if (!isAuthenticated()) {   
    require_once('assets/php/nav-guest.php');
}
else {
    require_once('assets/php/nav.php');
}

?>
<div id="container">
    <div class="content">
        <h1>Petadopt.</h1>
        <small>Ahol a kiskedvencek gazdára találnak.</small>
    </div>
</div>
<div class="index-title">
    <h1>Fedezd fel háziállatainkat!</h1>
</div>
<div id="searcher-bg">
    <div id="searcher">
        <div class="search-container">
            <form method="get" action="search.php">
                <input type="text" placeholder="Keresés.." name="search">
                <button type="submit"><i class="fa fa-search" style="font-size: 15px"></i></button>
            </form>
        </div>
    </div>
</div>
<div id="pet-bg">
    <div id="pet-main">
        <div class="pet-content">
            <span>Nálunk biztosan megtalálod, amire szükséged van.<br>Több mint 100 fajta kiskedvenc vár
                gazdára.</span><br>
            <a href="animals.php"><button>MEGTEKINTÉS</button></a>
        </div>
    </div>
</div>
<div id="about-bg">
    <div id="about-main">
        <div class="about-content">
            <h1>RÓLUNK</h1>
            <span><span class="petadopt-logo"><i style='font-size:30px' class='fas'>&#xf1b0;</i>Petadopt.</span> - Állatok
                örökbefogadása</span>
            <span>Az alábbi gombra kattintva megtudhatsz többet a cégünkről és sok minden másról.</span><br>
            <a href="about.php"><button>TUDJ MEG TÖBBET</button></a>
        </div>
    </div>
</div>
<div id="contact-bg">
    <div id="contact-main">
        <div class="contact-content">
            <h1>KAPCSOLAT</h1>
            <span>Lépj velünk kapcsolatba bátran.</span>
            <span>Ügyfeleink rövid időn belül felveszik veled a kapcsolatot.</span>
            <span>Tedd meg Te az első lépést, hogy megoldjuk a problémádat.</span><br>
            <a href="contact.php"><button>KAPCSOLAT</button></a>
        </div>
    </div>
</div>
<?php
require_once('assets/php/footer.php');
?>
</body>

</html>