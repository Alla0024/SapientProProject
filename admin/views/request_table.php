<?php

    if (isset($_POST['delete'])) {
        $request_id = $_POST['request-id'];
        Request::deleteRequest($request_id);
        header('Location: index_admin.php?action=request_table');
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
            $requests = Request::getRequests();
            foreach ($requests as $request) {
            ?>
                <tr>
                    <td><?php echo $request[0]; ?></td>
                    <td><?php echo $request[1]; ?></td>
                    <td><?php echo $request[2]; ?></td>
                    <td><?php echo $request[3]; ?></td>
                    <td><?php echo $request[4]; ?></td>
                    <td><?php echo $request[5]; ?></td>
                    <td><button><a href="index_admin.php?action=request_edit&request-id=<?=$request[0]?>"><i class="fas fa-pen-alt"></i></a></button>
                
                </td>
                    <td>
                        <form method="post" onSubmit="return confirm('Ви впевнені, що хочете видалити це назавжди?')">
                            <input type="hidden" name="request-id" value="<?= $request[0] ?>">
                            <button name="delete" type="submit"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
