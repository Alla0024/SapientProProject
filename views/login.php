<?php
if (isset($_POST['submit'])) {
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $is_admin = User::isAdmin($username, $mysqli);

    $hash = User::getUserByLogin($username);

    if (password_verify($password, $hash['password']) && ($hash['login_attempts'] < 5 || time() - $hash['last_login_attemps'] > 300)) {

        $_SESSION['Logged'] = 1;
        $_SESSION['username'] = $username;
        $_SESSION['is_admin'] = $is_admin;
        $_SESSION["id"] = $hash['id'];
        User::updateUserLoginAttempts(-1, $hash['login'], time(), $mysqli);
        header('Location: index.php?action=about');
        exit();
    } else {
        User::updateUserLoginAttempts($hash['login_attempts'], $hash['login'], time(), $mysqli);

        $user = User:: getUserLoginAttempts($hash['login'],  $mysqli);
        if ($user['login_attempts'] > 4) {
            echo "Повторіть спроби через 5 хвилин!";
        } else {
            echo "Неправильно введено пароль або логін!";
        }
    }
}
?>

<div class="login">
    <div class="container2">
        <div class="preg2">
            <form action="" class="form" method="POST">
                <div class="dws-input">
                    <input type="text" name="username" placeholder="Введіть логін">
                </div>
                <div class="dws-input">
                    <input type="password" name="password" placeholder="Введіть пароль">
                </div>
                <input class="dws-submit" type="submit" name="submit" value="Увійти">
            </form>
        </div>
    </div>
</div>