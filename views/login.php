<?php
if (isset($_POST['submit'])) {
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $hash = getUserByLogin($username);

    if (password_verify($password, $hash['password'])) {

        $_SESSION['Logged'] = 1;
        $_SESSION['username'] = $username;
        $_SESSION["id"] = $hash['id'];
        //echo "Success!";
        require_once("views/main.php");
        exit();
    } else {
        $stmt = $mysqli->prepare("UPDATE `users`    SET `login_attempts`=?, `last_login_attemps`=? WHERE `login`=?");

        $currentDate = time();
        $hash['login_attempts']++;

        $stmt->bind_param('sss', $hash['login_attempts'], $currentDate, $hash['login']);
        $stmt->execute();
        if ($hash['login_attempts'] > 5) {
            echo "Повторіть спроби через 5 хвилин!";
        } else {
            echo "INVALID USERNAME/PASSWORD Combination!";
        }
    }
}
?>

<div class="login">
    <div class="container2">
        <div class="preg2">
            <form action="" method="POST">
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