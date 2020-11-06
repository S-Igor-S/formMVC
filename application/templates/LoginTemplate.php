<form enctype='multipart/form-data'  action = '' method = 'POST'>

        <p>Введите логин или адрес электронной почты:<br> <input name = 'login' value = <?=$_REQUEST['login'];?>></p>

        <p>Введите пароль:<br> <input type = 'password' name = 'password' value = <?=$_REQUEST['password']?>></p>

        <p><input type = 'submit' name = 'submit'></p>
</form>