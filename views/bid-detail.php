<div class="login2 ">
    <div class="row">
        <?php
        $class_id = $_GET['class-id'];
        $class = Bid::getClassById($class_id)
        ?>
        <div class="class-detail">
            <?php if ($class['image']) { ?>
                <img src="images/<?= $class['image'] ?>" class="card-img-top" alt="...">
            <?php } else { ?>
                <img src="images/grup.png" class="card-img-top" alt="...">
            <?php } ?>
            <div class="card-body">
                <h5 class="card-title"> <?= $class['class'] ?> </h5>
                <p class="card-text"> <?= $class['description'] ?> </p>
                <a href="index.php?action=bids&class-id=<?= $class['id'] ?>&class-name=<?= $class['class'] ?>" class="btn btn-primary">Записатися</a>
            </div>
        </div>
    </div>

    <form method="post" enctype="multipart/form-data">
        <p> Загрузити картинку </p>
        <input type="file" name="img_upload"><input type="submit" name="upload" value="Загрузити">
        <?php
        if (isset($_POST['upload'])) {
            if (!empty($_FILES['img_upload']['name'])) $img = $_FILES['img_upload']['name'];
            $connection = Bid::addImg($img, $class_id);
        }
        ?>
    </form>

    <br>
    <br>
    <?php
    require_once("layout/footer.php"); ?>
    </body>