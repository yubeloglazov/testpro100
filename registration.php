<?php
include 'config.php';
include 'header.php';
?>
    <form action="reg_handler.php" method="post" id="reg_form">
        <div id="message"></div>
        <div>Имя: </div><input name="name" maxlength="100">
        <div>Обо мне: </div><input name="about">
        <div>Мои хобби: </div><input name="hobby">
        <div>Логин: </div><input name="login" maxlength="100">
        <div>Пароль: </div><input name="password" maxlength="100">
        <input type="submit">
    </form>
<?php include 'footer.php'; ?>
<script type="text/javascript">
$("#reg_form").submit(function(event) {
    event.preventDefault();
    if ($("#reg_form").find("input[name='name']").val().length < 1) {
        alert("Не указано имя");
    } else if ($("#reg_form").find("input[name='about']").val().length < 1) {
        alert("Не указана информация о себе");
    } else if ($("#reg_form").find("input[name='hobby']").val().length < 1) {
        alert("Не указано хобби");
    } else if ($("#reg_form").find("input[name='login']").val().length < 1) {
        alert("Не указан логин");
    } else if ($("#reg_form").find("input[name='password']").val().length < 1) {
        alert("Не указан пароль");
    } else {
        $.post('reg_handler.php', $("#reg_form").serialize(),
            function(data) {
                if (data == 'correct') {
                    console.log("http://" + "<?= $_SERVER['HTTP_HOST'] ?>" + "/main.php");
                
                    location="http://" + "<?= $_SERVER['HTTP_HOST'] ?>" + "/main.php";
                } else 
                    $('#message').html(data);
        });
    }
});
</script>    