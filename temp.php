<?php
//session_start();
require_once "functions.php";
$filename ='file.txt';

$login = 'Dasha';
$password = 'gfhjkm';
$login1 = 'Misha';
$password1 = 'gfhjkm1';

$password_hash = sha1 ($password);
$password_hash1 = sha1 ($password1);
//$text = array_combine($a, [$login, $password_hash]);

$text1 = array_combine(["login", "password"], [$login, $password_hash]);
$text = json_encode(array_combine(["login", "password"], [$login, $password_hash]));
 $fh = fopen($filename, 'w');
fwrite($fh, $text);
 fclose($fh);

echo '<pre>';
print_r($text1);

$text2 = array_combine (["login", "password"], [$login1, $password_hash1]);
print_r($text2);

$result[] = $text1;
$result[] = $text2;
print_r($result);
$q= json_encode ($result);
$fh = fopen($filename, 'w');
fwrite($fh, $q);
 fclose($fh);

$file = fopen($filename, 'r');
$array_read_JSON = fread($file, filesize($filename));
$array_read = json_decode($array_read_JSON, true);
print_r($array_read);

if (isset($_POST['register'])) {

  echo "зарегился!";
}

echo date_default_timezone_get();
// date_default_timezone_set('Asia/Yekaterinburg');
// echo date_default_timezone_get();





<p> Добро, пожаловать, <p> <?php getCurrentUser () ?> <p> ! </p>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Сайт массажного салона</title>
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
        <header >
            <div align = "center">
            <p class = "headertext">Массажный салон</p>
            <p class = "headertext">Нирвана</p>
            </div>
        </header>
        <nav>
        <a href="#general">Общий массаж</a>
                <a href="#back">Массаж спины</a>
                <a href="#anti">Антицеллюлитный массаж</a>
                <a href="#promo">Акции</a>
        </nav>


        <p>Добро пожаловать, <?php 
        getCurrentUser ()   ?> !<p>


// функция вовращает массив из двух элементов 
function getPartsFromFullname ($fullname) {
    $a = ["login", "password"];
    return array_combine ($a, explode (" ", $fullname));
  }


  function getUsersList($arr) {
    foreach ($arr as &$value) {
        $value = getPartsFromFullname ($value);
      }
     // unset($value);
     return $arr;
    }


$b = getUsersList($lines);
//print_r($lines[0]['login']);
echo '<pre>';
print_r($b);


echo '<pre>';

//echo "хэш: " . sha1('gfhjkm1'). PHP_EOL;
//echo "хэш: " . sha1('gfhjkm2'). PHP_EOL;
//echo "хэш: " . sha1('gfhjkm3'). PHP_EOL;
echo nl2br("\n");
echo nl2br("your first line\n your second line"); 


//это было в конце index.php


$auth = $_SESSION['auth'] ?? null;
echo ($auth);

if(!$auth) { ?>
  <!-- <html>
  <body>
      <form action="process1.php" method="post">
          <input name="login" type="text" placeholder="Логин">
          <input name="password" type="password" placeholder="Пароль">
          <input name="submit" type="submit" value="Войти">
      </form>
  </body>
  </html> -->

<?php }



function registerUsertoFile ($login, $password_hash ) {
  $array_read = getUsersList();
  if (existsUser($login)) {
    ?> <p align = "center"> Такой пользователь уже есть! </p> <?
    return false;
  }
  else {
  $array_new = array_combine(["login", "password"], [$login, $password_hash]); 
  $array_read[]=$array_new;
    $file = fopen('file.txt', 'w');           
    fwrite($file, json_encode ($array_read));
    fclose($file); 
    return true;
  } 
 
}
login = 'Dasha'; password = 'gfhjkm';