<?php
include_once "config.php";

if (!isset($_POST['login'])
    || !isset($_POST['password'])
    || !isset($_POST['name'])
    || !isset($_POST['about'])
    || !isset($_POST['hobby'])) {
    echo "Не указана информация";
    return;
}

$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($mysqli->connect_errno) {
    echo "Cant connect to MySQL: (" 
        . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    return;
}

$res = $mysqli->query("SELECT * FROM `users` WHERE `login` = '"
                        . $_POST['login'] . "'");
if (!$res) {
    echo "Cant SELECT from table: (" . $mysqli->errno . ") " . $mysqli->error;
    return;
}

if ($res->num_rows) {
    echo "Логин занят";
    return;
}

$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    return;
}
$res = $mysqli->query("INSERT INTO `users`(`name`, `login`,
        `password`, `about`, `hobby`) VALUES ('" 
        . $_POST['name'] . "','" 
        . $_POST['login'] . "','" 
        . $_POST['password'] . "','" 
        . $_POST['about'] . "','" 
        . $_POST['hobby'] . "')");
if (!$res) {
    echo "Не удалось вставить строку в таблицу: (" . $mysqli->errno . ") " . $mysqli->error;
    return;
}

session_start();
$_SESSION['login'] = $_POST['login'];
$_SESSION['password'] = $_POST['password'];

echo "correct";
return;

