<?php  
session_start();

$auth = $_SESSION['auth'] ?? null;

// вычисляем время до конца суток для персональной акции
if (isset ($auth)) { 
    $_SESSION['time'] = time();

    $hour = date ('H');
    $minute = date ('i');
    $second = date ('s');
    
    $temph = 24 - $hour;
    $tempm = 60 - $minute;
    $temps = 60 - $second;
}?> 

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
        <?php  if ($auth) {   ?>     
                <p align = "center"> Добро, пожаловать, <?php echo $login ?> ! </p>  <?php 
        } ?>
        <br>
        <header >
            <div align = "center">
            <p class = "headertext">Массажный салон</p>
            <p class = "headertext">Нирвана</p>
            </div>
        </header>
        <nav>
            <a href="#general">Общий массаж</a>
            <a href="#back">Массаж спины</a>
            <a href="#neck">Массаж шеи</a>
            <a href="#action">Акции</a>
            <?php  if ($auth) {   ?> 
                <a href="#cabinet">Личный кабинет</a> <?php 
            } ?>
        </nav>
        <div align = "center">
            <a id="general">
                <h2>Общий массаж</h2>
            </a>
            <img src="/image/general.jpg" alt="общий массаж" width="400" height="400" >
            <p align = "justify" >Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum..</p>
        </div>           
        <div>
            <a id="back">
                <h2>Массаж спины</h2>
            </a>
            <img src="/image/back.jpg" alt="массаж спины" width="400" height="400" >
            <p align = "justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum..</p>
        </div>
        <div>
            <a id="neck">
                <h2>Массаж шеи</h2>
            </a>
            <img src="/image/neck.jpg" alt="массаж шеи" width="500" height="400" >
            <p align = "justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum..</p>
        </div>
        <div>
            <a id="action">
                 <h2>Акции нашего салона</h2>
            </a>
            <img src="/image/action.png" alt="акции" width="400" height="400" >
            <p align = "justify"> В день рожденья мы дарим скидку 5% нашим клиентам ! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum..</p>
        </div>
        <div>
            <?php if ($auth) {   ?>
                    <a id="cabinet">
                        <h2>Ваш личный кабинет</h2>
                    </a>
                    <p>Вы вошли как <?php echo $login ?> !</p>
                    <p> Для вас персональная скидка 5 % !</p> <?php ?>
                    <p> Ваша персональная скидка заканчивается через <?php echo $temph ?> ч <?php echo $tempm ?> мин <?php echo $temps ?> сек </p> <?php ?>                                     

                    <form action="index.php" method = "post">
                    <?php if (!isset ($_SESSION['bd'])) { ?> 
                            <p> <?php echo ($login)?>, введите дату вашего рождения в формате ДД.ММ.ГГГГ (например 26.01.1993): </p> 
                            <input type="text" name="birthday" placeholder="ДД.ММ.ГГГГ"> 
                            <br>
                            <input type="submit" name="submit_birth" value="Ввести"><?php 
                    }; ?>
                    </form>

                    <?php if (isset ($_SESSION['bd']) && !$_SESSION['bd'] == 0) { ?> 
                            <p> До вашего дня рожденья осталоcь <?php echo $_SESSION['bd'] ?> дн. </p> <?php 
                    } ?>
                    <?php if (isset ($_SESSION['bd']) &&  $_SESSION['bd'] == 0) { ?> 
                            <p> Поздравляем с днем рожденья! У вас персональная скидка 5% на все услуги салона</p> <?php 
                    } ?>
                    <br> 
                    <a href="logout.php" class = "reg">Выход</a> 
        <?php } ?>
    </body>
</html>