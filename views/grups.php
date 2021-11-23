<?php if (isset($_SESSION["Logged"]) && $_SESSION['is_admin']['admin'] == 1) { ?>
    <div class="login">
        <table>
            <tr>
                <th>ID</th>
                <th>клас</th>
                <th>форма навчання</th>
                <th>предмет</th>
                <th>бажаний час</th>
                <th>інші побажання</th>
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
                    <td><i class="fas fa-pen-alt"></i></td>
                    <td style="text-align: center;"><i class="fas fa-trash-alt"></i></td>
                </tr>
            <?php } ?>
        </table>
    </div>
<?php } else { ?>
    <div class="login intro__suptitle">Ви не маєте доступу до цієї сторінки!</div>
<?php } ?>