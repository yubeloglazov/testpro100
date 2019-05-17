<?php
include_once "config.php";

function get_session_user() {

    if (!isset($_SESSION['login'])
            || !isset($_SESSION['password'])) {
        return false;
    }
    global $dbhost, $dbuser, $dbpass, $dbname;
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    if ($mysqli->connect_errno) {
        echo "Cant connect to MySQL: (" 
            . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        return false;
    }

    $res = $mysqli->query("SELECT * FROM `users` WHERE `login` = '"
                            . $_SESSION['login'] . "'");
    if (!$res) {
        echo "Cant SELECT from table: (" . $mysqli->errno . ") " . $mysqli->error;
        return false;
    }

    if (!$res->num_rows) {
        return false;
    }

    $row = $res->fetch_assoc();
    if ($row['password'] != $_SESSION['password']) {
        return false;
    }
    return $row;
}

function unauthorized_redirect() {
    $_SESSION['authorization_error'] = true;
    header('HTTP/1.1 200 OK');
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/index.php');
    exit;
}

function authorized_redirect() {
    header('HTTP/1.1 200 OK');
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/main.php');
    exit;
}