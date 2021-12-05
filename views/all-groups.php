<div class="login2 ">
    <div class="row">
        <?php
        $klas = Bid::getAllClass();
        foreach ($klas as $elem) {
        ?>
            <div class="card col-md-1" style="width: 18rem;">
                <img src="images/grup.png" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title"> <?= $elem['class'] ?> </h5>
                        <p class="card-text"> <?= $elem['description'] ?> </p>
                    <a href="index.php?action=bid-detail&class-id=<?= $elem['id'] ?>"> Детально </a>
                    <br>
                    <a href="index.php?action=bids&class-id=<?= $elem['id'] ?>&class-name=<?= $elem['class'] ?>" class="btn btn-primary">Записатися</a>
                </div>
            </div>
        <?php } ?>
    </div>
    <br>
    <br>
    <?php
    require_once("layout/footer.php"); ?>
    </body>