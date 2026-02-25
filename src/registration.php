<?php

require_once __DIR__ . '/helpers.php';

$login = $_POST["login"];
$password = $_POST["password"];

if (!$login || !$password) {
    die("Ошибка: Логин или пароль не заполнены!");
}

$connect = getDB();

try {
    $sql = "INSERT INTO `register` (login, password) VALUES ('$login', '$password')";
    $connect->query($sql);
    echo 'Регистрация прошла успешно!';
} catch (mysqli_sql_exception $e) {
    // Код ошибки 1062 — это Duplicate entry
    if ($e->getCode() === 1062) {
        echo 'Данный пользователь уже зарегистрирован :(';
    } else {
        echo 'Произошла ошибка: ' . $e->getMessage();
    }
}
