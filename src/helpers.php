<?php

const DB_HOST = 'mysql-8.0'; // Добавили порт 33060
const DB_NAME = 'register';
const DB_USER = 'root';
const DB_PASS = '';

function getDB(): mysqli|bool {
    // Используем @, чтобы не видеть старую ошибку, если порт не тот
    $link = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    // Если 33060 не подошел, пробуем стандартный 3306
    if (!$link) {
        $link = @mysqli_connect('127.0.0.1:3306', DB_USER, DB_PASS, DB_NAME);
    }
    
    if (!$link) {
        die("Ошибка подключения: " . mysqli_connect_error());
    }
    
    return $link;
}

