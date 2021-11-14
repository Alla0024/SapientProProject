<?php
$mysqli = dbConnect();
function loginExists($login)
{
    global $mysqli;
    $is_login = $mysqli->prepare("SELECT login FROM users WHERE login=?");
    $is_login->bind_param('s', $login);
    $is_login->execute();
    return $is_login->get_result()->fetch_assoc();
}

function getUserByLogin($login)
{
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT id, login, password, login_attempts, last_login_attemps FROM users WHERE login=? LIMIT 1");
    $stmt->bind_param('s', $login);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function addUser($name, $username, $password_hash, $email, $phone, $country)
{
    global $mysqli;
    $stmt = $mysqli->prepare("INSERT INTO `users`(`name`,`login`,`password`,`email`,`phone`,`country`) 
VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $username, $password_hash, $email, $phone, $country);
    $stmt->execute();
}
