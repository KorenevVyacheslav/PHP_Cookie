
<?php
session_start();
require_once "functions.php";
$reg_ok = true;   // переменная для блокировки сообщения "Неправильный логин или пароль!" при ошибке регистрации 

// обработка введённой даты рождения
if (isset($_POST['birthday'])) {
    $days = howMuchDays ();
    if ( $days == -1) { 
      ?> <p align = "center"> Неправильная дата! Введите ещё раз</p> <?
    }
    else $_SESSION['bd'] =  $days;
}

// если пользователь ранее уже прошёл аутентификацию при перезапуске страницы возвращаем пользователя
if (isset($_COOKIE['login'])) {
    $_SESSION['auth'] = true;
    $login = $_COOKIE['login'];
}

// регистрация пользователя
if (isset($_POST['register'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $password_hash = sha1 ($password);
    
    if (!registerUsertoFile ($login, $password_hash)) {               //записываем нового пользователя в файл file.txt
      ?> <p align = "center"> Такой пользователь уже есть! </p> <?;   //если неудачно 
      $reg_ok = false;                                               
};  

    $file = fopen('file.txt', 'r');                                   // формируем массив пользоватлей с уже новым пользователем
    $array_read_JS = fread($file, filesize('file.txt'));
    $string = file_get_contents('file.txt');
    fclose($file);
    $array_read = json_decode($string, true);
}

// обработка аутентификации
if (isset($_POST['login']) && isset($_POST['password'])) {
    if (getCurrentUser ()) { 
        $login = getCurrentUser (); 

        $_SESSION['login'] = $login; 
        $_SESSION['auth'] = true; 
        setcookie('login', $login);             //запоминаем пользователя         
    } else { 
        if ($reg_ok) {                        // это сообщение не должно выводиться при ошибке регистрации         
        ?><p align = "center"> Неправильный логин или пароль! Проверьте и введите ещё раз.</p> <?
        }
    require_once "login.php";
    }
}
else { 
  if (!isset($_COOKIE['login']))  {require_once "login.php";}
}

require_once "main.php";







