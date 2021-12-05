<div class="login2 ">
    <div class="row">
        <?php
        $class_id = $_GET['class-id'];
        $class = Bid::getClassById($class_id)
        ?>
        <div class="class-detail">
                <img src="images/grup.png" class="card-img-top" style="width: 300px" alt="...">
                <div class="card-body">
                    <h5 class="card-title"> <?= $class['class'] ?> </h5>
                    <p class="card-text"> <?= $class['description'] ?> </p>
                    <a href="index.php?action=bids&class-id=<?=$class['id']?>&class-name=<?=$class['class']?>" class="btn btn-primary">Записатися</a>
                </div>
            </div>
    </div>
    <br>
    <br>
    <?php
    require_once("layout/footer.php"); ?>
    </body>