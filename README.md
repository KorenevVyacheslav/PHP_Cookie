# <p align='center'>Сайт массажного салона</p>

<p align='center'>Разработан в качестве практического задания на курсе "Базовый Backend. Сессии и Cookie в php."</p>

<p> Перечень функций </p>

+ getUsersList() - возвращает массив всех пользователей и хэшей их паролей.
+ existsUser($login) - проверяет, существует ли пользователь с указанным логином.
+ checkPassword($login, $password) - возвращает true тогда, когда существует пользователь с указанным логином и введенный им пароль прошел проверку.
+ getCurrentUser() - возвращает либо имя вошедшего на сайт пользователя, либо null.
+ registerUsertoFile ($login, $password_hash) - записывает в файл с пользователями file.txt нового пользователя с login, password_hash.
+ validateDate($date) - проверяет правильность введённой даты.
+ howMuchDays () - вычисляет разницу дней между сегодняшней и введённой датой рождения с проверкой правильности даты.

## Особенности
* После аутентификации пользователю предлагается персональная скидка в 5%, действие которой заканчивается в 24:00 текущих суток, при этом показывается оставшееся время по условиям ТЗ.
* День Рожденья пользователя не записывается в файл по условиям ТЗ. Поэтому хранится только до истечения Cookie.

## Используемые технологии

* PHP

## Как открыть/запустить

Клонировать https://github.com/KorenevVyacheslav/PHP_Cookie на свой ПК. Скопировать файлы из этой папки в вашу текущую папку локального сервера Open Server Panel и запустить его.
