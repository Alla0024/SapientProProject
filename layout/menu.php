<header class="header">
    <div class="container">
        <div class="header__inner">
            <div class="header__school"><a class="nav__link" href="index.php?action=main">Онлайн школа математики</a></div>

            <nav class="nav">
                <a class="nav__link" href="index.php?action=about">Про нас</a>
                <a class="nav__link" href="index.php?action=registration">Реєстрація</a>


                <a class="nav__link" href="#">Контакти</a>
                <?php
                if (isset($_SESSION["Logged"])) {
                ?>
                    <a class="nav__link" href="index.php?action=logout">Вихід</a>
                <?php
                } else {
                ?>
                    <a class="nav__link" href="index.php?action=login">Вхід</a>
                <?php
                }
                ?>
            </nav>
        </div>
    </div>
</header>