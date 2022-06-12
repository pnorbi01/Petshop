<footer>
    <div class="upper-footer">
        <div class="left">
            <ul>
                <li class="title">Közösségi felületeink</li>
                <li><a href="https://facebook.com">Facebook</a></li>
                <li><a href="https://instagram.com">Instagram</a></li>
                <li><a href="https://twitter.com">Twitter</a></li>
                <li><a href="https://linkedin.com">LinkedIn</a></li>
            </ul>
            <ul>
                <li class="title">Petadopt</li>
                <li><a href="animals.php">Fedezd fel kiskedvenceinket</a></li>
            </ul>
            <ul>
                <li class="title">Tudnivalók a Petadopt-ról</li>
                <li><a href="contact.php">Kapcsolatfelvétel a Petadopt-al</a></li>
                <li><a href="about.php">Tudj meg többet rólunk</a></li>
            </ul>
        </div>
    </div>
    <div class="copyright">
        <span>Copyright <i style="font-size:15px" class="fa">&#xf1f9;</i> <?php echo date("Y"); ?> Petadopt. Minden jog fenntartva.</span>
    </div>
</footer>
<style>
footer {
    color: #6e6e73;
    padding: 1em;
    background-color: #f5f5f7;
}

footer ul,
footer li {
    margin: 0;
    padding: 0;
    list-style: none;
}

footer a {
    color: #6e6e73;
    text-decoration: none;
}

.upper-footer {
    display: flex;
    justify-content: center;
    text-align: left;
    margin-bottom: 50px;
}

.upper-footer .left {
    display: flex;
    align-items: flex-start;
    gap: 2em;
}

.upper-footer li.title {
    color: #1d1d1f;
    font-size: 20px;
    font-weight: bold;
    text-transform: uppercase;
}

footer li a:hover {
    text-decoration: underline;
}

.copyright {
    font-size: .8em;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 1em;
}

@media only screen and (max-width: 480px) {
    footer {
        padding: 0;
    }

    .upper-footer .left {
        margin-top: 10px;
        gap: 1em;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        text-align: center;
    }

    .copyright {
        text-align: center;
    }
}

</style>