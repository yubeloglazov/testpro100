<?php
include_once "functions.php";
session_start();
$row = get_session_user();
if (!$row)
    unauthorized_redirect();
?>
<?php include 'header.php'; ?>
<div><?= $row['hobby'] ?></div>
<?php include 'footer.php'; ?>
