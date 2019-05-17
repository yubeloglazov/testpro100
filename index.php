<?php
include 'config.php';
include 'functions.php';
session_start();
$row = get_session_user();
if ($row)
    authorized_redirect();
include 'header.php';
?>

    <form action="login_handler.php" method="post" id="login_form">
        <div id="message"><?php 
        echo isset($_SESSION['authorization_error']) 
            ? "Для входа на данную страницу нужна авторизация или регистрация" 
            : "";
        unset($_SESSION['authorization_error']);
        ?></div>
        <div>Логин: </div><input name="login" maxlength="100">
        <div>Пароль: </div><input name="password" maxlength="100">
        <input type="submit">
    </form>
    <a href="registration.php">Регистрация</a>
<?php include 'footer.php'; ?>
<script type="text/javascript">
$("#login_form").submit(function(event) {
    event.preventDefault();
    $.post('login_handler.php', $("#login_form").serialize(),
            function(data) {
                if (data == 'correct')
                    location="http://" + "<?= $_SERVER['HTTP_HOST'] ?>" + "/main.php";
                else
                    $('#message').html(data);
    });
});
</script>    

