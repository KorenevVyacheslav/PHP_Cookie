<?php
session_start();

//возвращает массив пользователей
function getUsersList() {
    $string = file_get_contents('file.txt');
    $usersArray= json_decode($string, true);
    return $usersArray;
}

// проверяет существует ли такой пользователь
function existsUser($login) {
    $usersArray = getUsersList();
    foreach ($usersArray as $key => $value) {
        if ($usersArray[$key]['login'] == $login) {$x = true; break;}
        else $x = false;
    }
    return $x;
}

// проверяет логин и пароль 
function checkPassword($login, $password) {
    $usersArray = getUsersList();
    if (existsUser($login))  {
        $key = array_search($login , array_column($usersArray, 'login'));
        if (sha1 ($password) === $usersArray[$key]['password'] ) {
            $x = true;
        }
        else $x = false;
    }
    else $x = false;
    return $x;
}

// возвращает имя текущего пользователя
function getCurrentUser (){
    if (isset ($_POST['login'])) $login = $_POST['login']; 
    if (isset ($_POST['password'])) $password = $_POST['password'];
    
    if (checkPassword($login, $password)) { 
         return $login;
    }
    else return null;
}


// записывает в файл с пользователями file.txt нового пользователя с login, password_hash
function registerUsertoFile ($login, $password_hash ) {
    $array_read = getUsersList();
    if (existsUser($login)) {
        return false;
    }  else {
        $array_new = array_combine(["login", "password"], [$login, $password_hash]); 
        $array_read[]=$array_new;
        $file = fopen('file.txt', 'w');           
        fwrite($file, json_encode ($array_read));
        fclose($file); 
        return true;
    } 
}

// проверяет правильность введённой даты 
function validateDate($date) {
    $format = 'Y-m-d';
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}

// вычисляет разницу дней между сегодняшней и введённой датой рождения с проверкой правильности даты
function howMuchDays () {
    if (!empty($_POST['birthday'])) {
        $birtday = $_POST['birthday'];  
        $day = substr($birtday, 0, 2);
        $month = substr($birtday, 3, 2);
        $year = substr($birtday, 6, 4);

        if (!validateDate("$year-$month-$day")) { 
          return -1;
        } else {
            $datetime1 = date_create("$year-$month-$day");
            $datetime2 = date_create(date ('Y-m-d'));             // Y-m-d текущая дата
            $interval = date_diff($datetime1, $datetime2);
            $daysleft = $interval->d;                             // разница дней     
            $bd_nextyear = $interval->invert;                     // было ДР в этом году или нет
            if (!$bd_nextyear && (!$daysleft == 0) ) $daysleft = 365 - $daysleft;
            return $daysleft;
        }
    }
}

      // раскоментировать для записи первых трех пользователей (проверки на пустой файл нет)
      // по ТЗ должен быть изначально массив пользователей
      // последующие пользователи добавляются через регистрацию

      // $login = 'Dasha'; $password = 'gfhjkm';
      // $login1 = 'Misha'; $password1 = 'gfhjkm1';
      // $login2 = 'Sveta'; $password2 = 'gfhjkm2';
           
      // $password_hash = sha1 ($password);
      // $password_hash1 = sha1 ($password1);
      // $password_hash2 = sha1 ($password2);
       
      // $a = array_combine(["login", "password"], [$login, $password_hash]);
      // $b = array_combine(["login", "password"], [$login1, $password_hash1]);
      // $c = array_combine(["login", "password"], [$login2, $password_hash2]);
      // $sum[] = $a;
      // $sum[] = $b;
      // $sum[] = $c;
      // $file = fopen('file.txt', 'w');
      // fwrite($file, json_encode ($sum));
      // fclose($file);