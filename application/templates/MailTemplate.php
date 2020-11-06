<body>
    <h2>Вы правильно заполнили форму</h2>
    <b>Имя:</b> <?=$_REQUEST['login']?><br>
    <b>Пароль:</b><?=$_REQUEST['password']?><br>
    <b>Возраст:</b><?=$_REQUEST['age']?><br>
    <b>Дата рождения:</b><?=$_REQUEST['date']?><br>
    <b>Email:</b><?=$_REQUEST['email']?><br>
    <b>Телефон:</b><?=$_REQUEST['tel']?><br>
    <b>Пол:</b><?=$_REQUEST['gender']?><br>
    <b>Знание языков программирования:</b><?=implode(', ' , $_REQUEST['lang'])?><br>
    <b>Любимый язык программирования:</b><?=$_REQUEST['favLang']?><br>
</body>