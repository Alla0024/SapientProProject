<?php
$error['errors'] = [];
if (isset($_POST['submit'])) {
    $class = isset($_POST['class']) ? $_POST['class'] : '';
    $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
    $study = isset($_POST['formstudy']) ? $_POST['formstudy'] : '';
    $time = isset($_POST['time']) ? ($_POST['time']) : '';
    $other = isset($_POST['other']) ? ($_POST['other']) : '';

    if (!$class || !$subject || !$study) {
        array_push($error['errors'], "Не всі поля заповнені!");
    }

    if (empty($error['errors'])) {
        Bid::addBid($class, $subject, $study, $time, $other, $mysqli);
        header('Location: index.php?action=welcomebid');
    } else {
        header('Location: index.php?action=bids&' . http_build_query($error));
    }
} else {
?>
    <div class="login3">
        <?php
        if (isset($_GET['errors'])) {
            foreach ($_GET['errors'] as $key => $value) {
                echo $value . ' ';
            }
        }
        $class_name = isset($_GET['class-name']) ? ($_GET['class-name']) : '';
        $class_id = isset($_GET['class-id']) ? ($_GET['class-id']) : '';


        ?>
        <div class="container3">
            <div class="preg2">
                <form action="" method="POST" class="form">
                    <div class="dws-input">
                        <select class="test" name="class">
                            <?php if ($class_id) { ?>
                                <option value=<?= $class_id ?>><?= $class_name ?></option>
                            <?php } else { ?>
                                <option disabled selected>--Клас--</option>
                            <?php }
                            $klas = Bid::getAllClass();
                            foreach ($klas as $elem) {
                            ?> <option value="<?php echo $elem['id']; ?>"><?php echo $elem['class']; ?></option> <?php } ?>
                        </select>
                    </div>
                    <div class="dws-input">
                        <select class="test" name="subject">
                        <?php if ($class_id) { ?>
                                <option value=<?=3 ?>>Математика</option>
                            <?php } else { ?>
                                <option disabled selected>--Предмет--</option>
                            <?php }

                            $sub = Bid::getAllSubject();
                            foreach ($sub as $elem) {
                            ?> <option value="<?= $elem[0] ?>"><?= $elem[1] ?></option> <?php } ?>
                        </select>
                    </div>

                    <div class="dws-input">
                        <select class="test" name="formstudy">
                            <?php if ($class_id) { ?>
                                <option value=2>Група</option>
                            <?php } else { ?>
                                <option disabled selected>--Форма занять--</option>
                            <?php }
                            $formstudy = Bid::getAllForm();
                            foreach ($formstudy as $elem) {
                            ?> <option value="<?= $elem[0] ?>"><?= $elem[1] ?></option> <?php
                                                                                    }

                                                                                        ?>
                        </select>
                    </div>
                    <div class="dws-input">
                        <input type="text" name="time" placeholder="Бажанні дні та час занять">
                    </div>

                    <div class="dws-input">
                        <textarea style="width: 90%; height:100px; font-size:12px" type="text" name="other" placeholder="Інші побажаня"></textarea>
                    </div>

                    <input class="dws-submit" type="submit" name="submit" value="Надіслати">
                    <br />
                </form>
            </div>
        </div>
    <?php } ?>