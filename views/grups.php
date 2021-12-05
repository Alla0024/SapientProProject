<?php
if (isset($_SESSION["Logged"]) && $_SESSION['is_admin']['admin'] == 1) {
    if (isset($_POST['delete'])) {
        $book_id = $_POST['book-id'];
        Bid::deleteBid($book_id);
        header('Location: index.php?action=grups');
    } ?>
    <div class="login">
        <table>
            <tr>
                <th>ID</th>
                <th>Клас</th>
                <th>Форма навчання</th>
                <th>Предмет</th>
                <th>Бажаний час</th>
                <th>Інші побажання</th>
                <th>Редагувати</th>
                <th>Видалити</th>
            </tr>
            <?php
            $bids = Bid::getBids();
            foreach ($bids as $bid) {
            ?>
                <tr>
                    <td><?php echo $bid[0]; ?></td>
                    <td><?php echo $bid[1]; ?></td>
                    <td><?php echo $bid[2]; ?></td>
                    <td><?php echo $bid[3]; ?></td>
                    <td><?php echo $bid[4]; ?></td>
                    <td><?php echo $bid[5]; ?></td>
                    <td><button><a href="index.php?action=bids-edit&bid-id=<?=$bid[0]?>"><i class="fas fa-pen-alt"></i></a></button>
                
                </td>
                    <td>
                        <form method="post" onSubmit="return confirm('Ви впевнені шо хоче видалити це назавжди?')">
                            <input type="hidden" name="book-id" value="<?= $bid[0] ?>">
                            <button name="delete" type="submit"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
<?php } else { ?>
    <div class="login intro__suptitle">Ви не маєте доступу до цієї сторінки!</div>
<?php } ?>