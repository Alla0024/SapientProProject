<?php
$mysqli = dbConnect();
class User
{
    public static function loginExists($login)
    {
        global $mysqli;
        $is_login = $mysqli->prepare("SELECT login FROM users WHERE login=?");
        $is_login->bind_param('s', $login);
        $is_login->execute();
        return $is_login->get_result()->fetch_assoc();
    }

    public static function getUserByLogin($login)
    {
        global $mysqli;
        $stmt = $mysqli->prepare("SELECT id, login, password, login_attempts, last_login_attemps FROM users WHERE login=? LIMIT 1");
        $stmt->bind_param('s', $login);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function addUser($name, $username, $password_hash, $email, $phone, $country)
    {
        global $mysqli;
        $stmt = $mysqli->prepare("INSERT INTO `users`(`name`,`login`,`password`,`email`,`phone`,`country`) 
VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $name, $username, $password_hash, $email, $phone, $country);
        $stmt->execute();
    }

    public static function updateUserLoginAttempts($loginAttempts, $login, $currentDate, $mysqli)
    {
        $stmt = $mysqli->prepare("UPDATE `users` SET `login_attempts`=?, `last_login_attemps`=? WHERE `login`=?");

        $loginAttempts++;

        $stmt->bind_param('sss', $loginAttempts, $currentDate, $login);
        $stmt->execute();
    }
    public static function getUserLoginAttempts($login, $mysqli)
    {
        $stmt = $mysqli->prepare("SELECT login, login_attempts FROM users WHERE login=? LIMIT 1");

        $stmt->bind_param('s', $login);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }
    public static function isAdmin($login, $mysqli)
    {
        $stmt = $mysqli->prepare("SELECT admin FROM users WHERE login=? LIMIT 1");

        $stmt->bind_param('s', $login);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();   
    }

   
}
