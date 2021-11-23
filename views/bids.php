<?php
$error['errors'] = [];
if (isset($_POST['submit'])) {
    $class = isset($_POST['class']) ? $_POST['class'] : '';
    $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
    $study = isset($_POST['formstudy']) ? $_POST['formstudy'] : '';
    $time = isset($_POST['time']) ? ($_POST['time']) : '';
    $other = isset($_POST['other']) ? ($_POST['other']) : '';


    if (Valid::validateInput($time, '/^[a-zA-Zа-яА-ЯієїІЄЇґҐ0-9\-\'\_\ \.\,\:\;]{0,}$/', "Не коректно записано час та дату!")) {

        array_push($error['errors'], "Не коректно записано час та дату! ");
    }

    if (Valid::validateInput($time, '/^[a-zA-Zа-яА-ЯієїІЄЇґҐ0-9\-\'\_\ \.\,\:\;]{0,}$/', "Не коректно записано побажання щодо занять!")) {

        array_push($error['errors'], "Не коректно записано побажання щодо занять! ");
    }
    if (empty($error['errors'])) {
        Bid::addBid($class, $subject, $study, $time, $other, $mysqli);
        header('Location: index.php?action=welcomebid');
    } else {
        header('Location: index.php?action=bids&' . http_build_query($error));
    }
} else {



?>
    <div class="login">
        <?php
        if (isset($_GET['errors'])) {
            foreach ($_GET['errors'] as $key => $value) {
                echo $value . ' ';
            }
        }
        ?>
        <div class="container3">
            <div class="preg2">
                <form action="" method="POST">

                    <div class="dws-input">
                        <select class="test" name="class">

                            <option value="сlass">Клас</option>
                            <?php
                            $klas = Bid::getAllClass();
                            foreach ($klas as $elem) {
                            ?> <option value="<?php echo $elem[0]; ?>"><?php echo $elem[1]; ?></option> <?php
                                                                                                }

                                                                                                    ?>
                        </select>
                    </div>
                    <div class="dws-input">
                        <select class="test" name="subject">

                            <option value="subject">Предмет</option>
                            <?php
                            
                            $sub = Bid::getAllSubject();
                            foreach ($sub as $elem) {
                            ?> <option value="<?= $elem[0] ?>"><?= $elem[1] ?></option> <?php
                                                                                                }

                                                                                                    ?>
                        </select>
                    </div>

                    <div class="dws-input">
                        <select class="test" name="formstudy">

                            <option value="formstudy">Форма занять</option>
                            <?php
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
                        <input type="text" name="other" placeholder="Інші побажаня">
                    </div>

                    <input class="dws-submit" type="submit" name="submit" value="Надіслати">
                    <br />
                </form>
            </div>
        </div>
    <?php } ?>