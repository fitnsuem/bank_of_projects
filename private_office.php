<? session_start();?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="shortcut icon" href="icon.png" type="image/png">
    <title>Сайт спецсеминаров НГУЭУ</title>

    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<div id="page_wrap">
	<div id="shapka">
		<p style="margin-top:20px"><a href="index.php"><img align="left" src="logo.png"></a><h4>НОВОСИБИРСКИЙ ГОСУДАРСТВЕННЫЙ УНИВЕРСИТЕТ ЭКОНОМИКИ И УПРАВЛЕНИЯ (НИНХ)</h4></p>
	 <p><h4>Сайт спецсеминаров</h4></p>
	</div>
	<div id="menu">
		<li><a href="index.php">Главная</a>
        </li>
        <li><a href="#">Новости</a>
		</li>
		 <li><a href="specseminar.html">Спецсеминары</a>
		</li>
		 <li><a href="#">Преподаватели</a>
		</li>
	</div>
	<div id="content" style="height:500px">
		<div id="aut">
		<?php

$dbconfig = require('db_params.php');

$mysqli = new mysqli($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['db']);

if ($mysqli->connect_errno) {
    echo "Ошибка: Не удалсь создать соединение с базой MySQL и вот почему: \n";
    echo "Номер_ошибки: " . $mysqli->connect_errno . "\n";
    echo "Ошибка: " . $mysqli->connect_error . "\n";
    exit;
}
?>

            <?if(!empty($_GET['auth'])){
                session_destroy();
            }?>
            <? if(isset($_SESSION['USER'])):?>
                <p>Личный кабинет | <a href="index.php?auth=exit">Выйти</a></p>
				 <? $id = $_SESSION['USER']['ID'];
				 $query = "SELECT * FROM users WHERE `id` = '$id'";
		$result = $mysqli->query($query);
	 	while($user=$result->fetch_assoc()){
        if(isset($user['id'])){
				$login = $user['login'];
				$FIO = $user['FIO'];
				$course = $user['course'];
				$groupa = $user['groupa'];
        }
    }?>	
				<p>
				<? echo "Мой логин: $login";?> <br>
				<? echo "ФИО: $FIO";?> <br>
				<? echo "Курс: $course";?> <br>
				<? echo "Группа: $groupa";?> <br>
				<? echo "Мой спецсеминар: отсутствует";?> <br>
               </p>
            <?else:?>
                <form method="POST" action="login.php">
                    <p align="center"> Авторизация </p>
                    <input  required type="text" name="login" placeholder="Логин"><br>
                    <input required type="password" name="password" placeholder="Пароль"><br>
                    <input type="submit" name="submit" value="Войти">
                    <a href="registration.html">Зарегистрироваться</a>
                </form>
            <?endif;?>
		</div>
	</div>
	<div id="footer">
<p><b>© 2016-2017 <a href="index.html" title="Сайт спецсеминаров НГУЭУ">Сайт спецсеминаров НГУЭУ</a> | Копирование материалов разрешено с указанием источника <a href="index.html" title="Сайт спецсеминаров НГУЭУ">Сайт спецсеминаров НГУЭУ</b></a></p>
	</div>
</div>
</body>	
