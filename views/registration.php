<?php
$error['errors'] = [];
if (isset($_POST['submit'])) {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password1 = isset($_POST['password1']) ? ($_POST['password1']) : '';
    $password2 = isset($_POST['password2']) ? ($_POST['password2']) : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $country = isset($_POST['country']) ? $_POST['country'] : '';
    if (!preg_match('/^([a-zA-Z]+(?:(?! {2})[a-zA-Z\'\-])*[a-zA-Z]+)$|^([а-яА-ЯієїІЄЇґҐ]+(?:(?! {2})[а-яА-ЯієїІЄЇґҐ\'\-])*[а-яА-ЯієїІЄЇґҐ]+)$/', $name) && $name) {
        array_push($error['errors'], "Не коректно введено ім'я!");
    }
    if (!preg_match('/^[a-zA-Zа-яА-ЯієїІЄЇґҐ0-9\-\'\_]{4,}$/', $username)) {

        array_push($error['errors'], "Не коректно введено логін!");
    }
    if (!preg_match('/^(?=.*[0-9])(?=.*[a-zA-Z])(?=\S+$).{7,}|(?=.*[0-9])(?=.*[а-яА-ЯієїІЄЇґҐ])(?=\S+$).{7,}$/', $password1)) {
        array_push($error['errors'], "Пароль не відповідає вимогам!");
    }
    if ($password1 != $password2) {
        array_push($error['errors'], "Паролі не збігаються!");
    }

    if (!preg_match('/^[a-zA-Z0-9\.\-_]{2,}@[a-zA-Z0-9\-_]+\.[a-z]{2,3}$/', $email)) {

        array_push($error['errors'], "Не коректно введено email!");
    }

    if (!preg_match('/^([+]?[\s0-9]+)?(\d{3}|[(]?[0-9]+[)])?([-]?[\s]?[0-9])+$/', $phone) && $phone) {

        array_push($error['errors'], "Не коректно введено номер телефону!");
    }


    if (loginExists($username)) {
        array_push($error['errors'], 'Такий логін існує');
    }
    if (empty($error['errors'])) {
        $password_hash = password_hash($password1, PASSWORD_BCRYPT);

        addUser($name, $username, $password_hash, $email, $phone, $country);
        header('Location: index.php?action=welcome');
    } else {
        header('Location: index.php?action=registration&' . http_build_query($error));
    }
} else {

?>
    <div class="preg"> </div>
    <div class="registration">
        <?php
        if (isset($_GET['errors'])) {
            foreach ($_GET['errors'] as $key => $value) {
                echo $value . ' ';
            }
        }
        ?>
        <div class="container1">
            <img src="images/ic.png">
            <form action="" method="POST">
                <div class="dws-input">
                    <input type="text" name="name" placeholder="Введіть ім'я">
                </div>
                <div class="dws-input">
                    <input type="text" name="username" placeholder="Введіть логін" required>
                </div>
                <div class="dws-input">
                    <input type="password" name="password1" placeholder="Введіть пароль" required>
                </div>
                <div class="dws-input">
                    <input type="password" name="password2" placeholder="Введіть повторно пароль" required>
                </div>
                <div class="dws-input">
                    <input type="email" name="email" placeholder="Введіть електронну пошту" required>
                </div>
                <div class="dws-input">
                    <input type="text" name="phone" placeholder="Введіть номер телефону">
                </div>
                <div class="dws-input">
                    <select class="test" name="country">

                        <option value="сountry">Країна</option>
                        <?php
                        $countries = json_decode(file_get_contents(__DIR__ . "/country.json"), true);
                        foreach ($countries as $elem) {
                        ?> <option value="<?= $elem['code'] ?>"><?= $elem['name'] ?></option> <?php
                                                                                            }

                                                                                                ?>
                    </select>
                </div>
                <input class="dws-submit" type="submit" name="submit" value="Зареєструватися">
                <br />
            </form>
        </div>
    </div>
<?php
}
?>