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

$sql = "SELECT * FROM users";
if (!$result = $mysqli->query($sql)) {
    echo "Ошибка: Наш запрос не удался и вот почему: \n";
    echo "Запрос: " . $sql . "\n";
    echo "Номер_ошибки: " . $mysqli->errno . "\n";
    echo "Ошибка: " . $mysqli->error . "\n";
    exit;
}

$record = $result->fetch_assoc();
echo $record['content'];
			
        if(isset($_POST['submit'])) {
            $login = $_POST['login'];
            $password = md5($_POST['password']);
            $query = mysql_query("SELECT * FROM users WHERE `login` = '$login' AND `password` = '$password' ");
                while($user = mysql_fetch_array($query)){
                    if($user){
                        if(isset($user['id'])){
                            echo "Вы успешно зашли в систему!";
                            $_SESSION['USER']  = array(
                                'ID' => $user['id'],
                                'LOGIN' => $user['login'],
                            );
                        }
                    }

                }
        }

        ?>
		<p>Здравствуйте, <?=$_SESSION['USER']['LOGIN']?></p>
		<p><a href="private_office.php">Войти в Личный кабинет</a></p>

        </div>

    </div>
    <div id="footer">
    </div>
</div>
</body>
