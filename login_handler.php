<?php
include_once "config.php";

if (!isset($_POST['login'])
    || !isset($_POST['password'])) {
    echo "Не установлен логин и пароль";
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

if (!$res->num_rows) {
    echo "Неверный логин";
    return;
}

$row = $res->fetch_assoc();
if ($row['password'] != $_POST['password']) {
    echo "Неверный пароль";
    return;
}

session_start();
$_SESSION['login'] = $_POST['login'];
$_SESSION['password'] = $_POST['password'];

echo "correct";
return;