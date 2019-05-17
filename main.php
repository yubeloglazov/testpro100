<?php
include_once "functions.php";
session_start();
$row = get_session_user();
if (!$row)
    unauthorized_redirect();
?>
<?php include 'header.php'; ?>
<div>
    Здравствуй, <?= $row['name'] ?>!<br>
    <a href="hobby.php">Мое хобби</a><br>
    <a href="about.php">Обо мне</a><br>
    <a href="exit.php">Выход</a>
</div>
<?php include 'footer.php'; ?>