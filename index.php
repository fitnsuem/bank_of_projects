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
            <?if(!empty($_GET['auth'])){
                session_destroy();
            }?>
            <? if(isset($_SESSION['USER'])):?>
                <p>Здравствуйте, <?=$_SESSION['USER']['LOGIN']?></p>
				<p><a href="private_office.php">Войти в Личный кабинет</a></p>
                <a href="index.php?auth=exit">Выйти</a>
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