<?php
// $continue = 'yes';
// if(!empty($_COOKIE))
// {
// ?>
<!-- // <p>Вы уже заполняли ранее форму регистрации, хотите продолжить?</p>
// <p><button name = 'continue' value = 'yes'>Да</button> <button name = 'continue' value = 'no'>Нет</button></p> -->
<?php
//} else
//{
?>
    <form enctype='multipart/form-data'  action = '' method = 'POST'>

        <p>Логин: <input name = 'login' value = <?=$_REQUEST['login'];?>> Допустимые символы: [A-Z, a-z, 0-9, _], Первый символ: заглавная буква</p>

        <p>Пароль: <input type = 'password' name = 'password' value = <?=$_REQUEST['password']?>> Допустимые символы: [A-Z, a-z, 0-9, _], Должна быть одна цифра + буква</p>

        <p>Возраст: <input name = 'age' value = <?=$_REQUEST['age']; ?>> Допустимые символы: [0-9], Не больше 3 символов, 9 < Возраст < 128</p>

        <p>Дата рождения: <input type = 'date' name = 'date' value = <?=$_REQUEST['date']; ?> ></p>

        <p>Email: <input type = 'email' name = 'email' value = <?=$_REQUEST['email']; ?>> Допустимые символы: [A-Z, a-z, 0-9, _, @, .]</p>

        <p>Номер телефона: <input type = 'tel' name = 'tel' value = <?=$_REQUEST['tel']; ?>> Допустимые символы: [0-9, +], Номер телефона без кода страны должен составлять 10 символов</p>
        
        <p>
            Пол:<br>
            <?php if ($_REQUEST['gender'] == 'female') { ?>
                <label><input type = 'radio' name = 'gender' value = 'male'>Male</label><br> 
                <label><input type = 'radio' name = 'gender' value = 'female' checked>Female</label>
            <?php } else if ($_REQUEST['gender'] == 'male') { ?>
                <label><input type = 'radio' name = 'gender' value = 'male' checked>Male</label><br> 
                <label><input type = 'radio' name = 'gender' value = 'female'>Female</label>
            <?php } else { ?>
                <label><input type = 'radio' name = 'gender' value = 'male'>Male</label><br> 
                <label><input type = 'radio' name = 'gender' value = 'female'>Female</label>
            <?php } ?>    
        </p>

        <p>

            Знание языков программирования:<br>
            <?php if (isset($_REQUEST['lang']) && in_array('python', $_REQUEST['lang'])) { ?>
                <label><input type = 'checkbox' name = 'lang[]' value = 'python' checked>Python</label><br>
            <?php } else { ?>
                <label><input type = 'checkbox' name = 'lang[]' value = 'python'>Python</label><br>
            <?php } ?>

            <?php if (isset($_REQUEST['lang']) && in_array('javaScript', $_REQUEST['lang'])) { ?>
                <label><input type = 'checkbox' name = 'lang[]' value = 'javaScript' checked>JavaScript</label><br>
            <?php } else { ?>
                <label><input type = 'checkbox' name = 'lang[]' value = 'javaScript'>JavaScript</label><br>
            <?php } ?>

            <?php if (isset($_REQUEST['lang']) && in_array('php', $_REQUEST['lang'])) { ?>
                <label><input type = 'checkbox' name = 'lang[]' value = 'php' checked>PHP</label><br>
            <?php } else { ?> 
                <label><input type = 'checkbox' name = 'lang[]' value = 'php'>PHP</label><br>
            <?php } ?>

            <?php if (isset($_REQUEST['lang']) && in_array('cSharp', $_REQUEST['lang'])) { ?>
                <label><input type = 'checkbox' name = 'lang[]' value = 'cSharp' checked>C#</label><br>
            <?php } else { ?>
                <label><input type = 'checkbox' name = 'lang[]' value = 'cSharp'>C#</label><br>
            <?php } ?>

            <?php if (isset($_REQUEST['lang']) && in_array('java', $_REQUEST['lang'])) { ?>
                <label><input type = 'checkbox' name = 'lang[]' value = 'java'>Java</label>
            <?php } else { ?>
                <label><input type = 'checkbox' name = 'lang[]' value = 'java'>Java</label>
            <?php } ?>

        </p>

        <p>File: <input type = 'file' name = 'file'></p>

        <p>
            Выберите любимый язык программирования:<br>
            <input list = 'fordl' name = 'favLang' value = <?=$_REQUEST['favLang']; ?>>
            <datalist id = 'fordl'>
                <option>Python</option>
                <option>JavaScript</option>
                <option>PHP</option>
                <option>C#</option>
                <option>Java</option>
            </datalist>
        </p>
        <p><input type = 'submit' name = 'submit'></p>
    </form>
<?php    
//}
?>