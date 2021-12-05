<?php

$error['errors'] = [];
$edit_id = $_GET['bid-id'];
if (isset($_POST['submit'])) {
    $class = isset($_POST['class']) ? $_POST['class'] : '';
    $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
    $study = isset($_POST['formstudy']) ? $_POST['formstudy'] : '';
    $time = isset($_POST['time']) ? ($_POST['time']) : '';
    $other = isset($_POST['other']) ? ($_POST['other']) : '';
    if (empty($error['errors'])) {
        Bid::updateBidsEdit($class, $subject, $study, $time, $other, $edit_id);
        header('Location: index.php?action=grups');
    } else {
        header('Location: index.php?action=bids&' . http_build_query($error));
    }
} else {
?>
    <div class="login3">
    <?php
    $edit = Bid::getBidById($edit_id);
    ?>
    <div class="container3">
            <div class="preg2">
                <form action="" method="POST" class="form">
                    <div class="dws-input">
                        <select class="test" name="class">
                            <?php if ($edit) { ?>
                                <option value=<?= $edit['class_id'] ?>><?=$edit['class']?></option>
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
                        <?php if ($edit) { ?>
                                <option value=<?=$edit['subject_id']?>><?=$edit['subjects']?></option>
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
                            <?php if ($edit) { ?>
                                <option value=<?=$edit['form_study_id']?>><?=$edit['study']?></option>
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
                        <input id="timetable" type="text" name="time" placeholder="Бажанні дні та час занять">
                    </div>

                    <div class="dws-input">
                        <textarea style="width: 90%; height:100px; font-size:12px" type="text" name="other" placeholder="Інші побажаня"><?=$edit['other']?></textarea>
                    </div>

                    <input class="dws-submit" type="submit" name="submit" value="Надіслати">
                    <br />
                </form>
            </div>
        </div>
        <script type="text/javascript">
        document.getElementById('timetable').value = '<?=$edit['timetable']?>';
    </script>
    <?php } ?>