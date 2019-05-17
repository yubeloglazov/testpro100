<?php
session_start();
unset($_SESSION['login']);
unset($_SESSION['password']);
unset($_SESSION['authorization_error']);
header('HTTP/1.1 200 OK');
header('Location: http://' . $_SERVER['HTTP_HOST'] . '/index.php');
exit;

