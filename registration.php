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
		<div id="reg">
		<?php

$dbconfig = require('db_params.php');

$mysqli = new mysqli($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['db']);

if ($mysqli->connect_errno) {
    echo "Ошибка: Не удалсь создать соединение с базой MySQL и вот почему: \n";
    echo "Номер_ошибки: " . $mysqli->connect_errno . "\n";
    echo "Ошибка: " . $mysqli->connect_error . "\n";
    exit;
}

$sql = "SELECT * FROM users";
if (!$result = $mysqli->query($sql)) {
    echo "Ошибка: Наш запрос не удался и вот почему: \n";
    echo "Запрос: " . $sql . "\n";
    echo "Номер_ошибки: " . $mysqli->errno . "\n";
    echo "Ошибка: " . $mysqli->error . "\n";
    exit;
}

$res = $result->fetch_assoc();
echo $res['content'];
		

//header("Content-Type: text/html; charset=utf-8");?>
<?
 if(isset($_POST['submit'])){
     $login = $_POST['login'];
     $password = md5($_POST['password']);
     $FIO = $_POST['FIO'];
     $course = $_POST['course'];
     $group = $_POST['groupa'];
     $registration = true;
     $res = mysql_query("SELECT * FROM users WHERE `login` = '$login'");
    while($user = mysql_fetch_array($res)){
        if(isset($user['id'])){
            $registration = false;
        }
    }
    if($registration !== false){
        $query  = mysql_query("INSERT INTO users (`login`, `password`, `fio`, `course`, `groupa`) VALUES ('$login', '$password', '$FIO', $course, '$group')");

        if($query) {
            // setcookie("login", $login, time()+60*60*30); //куки на 30 минут
            echo "Вы зарегистрированны как $login";
            echo '<br><a href="index.php"> Авторизация</a>';
        }
    } else {
        echo "Такой пользователь уже существует";
        echo '<br><a href="registration.html"> Регистрация</a>';
    }


}
?>
		</div>
		
	</div>
	<div id="footer">
<p><b>© 2016-2017 <a href="index.html" title="Сайт спецсеминаров НГУЭУ">Сайт спецсеминаров НГУЭУ</a> | Копирование материалов разрешено с указанием источника <a href="index.html" title="Сайт спецсеминаров НГУЭУ">Сайт спецсеминаров НГУЭУ</b></a></p>
	</div>
</div>
</body>	
