<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Регистрация</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
		<link rel="shortcut icon" href="images/logo.png" type="image/png">
<!--[if IE 6]>
<link href="default_ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->
</head>
<body>
<div id="wrapper">
	<div id="header-wrapper">
		<div id="header" class="container">
			<div id="logo">
				<h1><a href="index.php">Bahilistich</a></h1>
			</div>
			<div id="social">
				<ul class="contact">
					<li><a href="#" class="icon icon-twitter"><span>Twitter</span></a></li>
					<li><a href="#" class="icon icon-facebook"><span>facebook</span></a></li>
					<li><a href="#" class="icon icon-dribbble"><span>Pinterest</span></a></li>
					<li><a href="#" class="icon icon-tumblr"><span>Google+</span></a></li>
					<li><a href="#" class="icon icon-rss"><span>Pinterest</span></a></li>
				</ul>
			</div>
		</div>
		<div id="menu" class="container">
			<ul>
				<li ><a href="index.php" accesskey="1" title="">Главная</a></li>
			<li><a href='news.php' accesskey='1' title=''>Новости</a></li>
				<li><a href='gost.php' accesskey='2' title=''>Отзывы</a></li>
				<li class="current_page_item"><a href="avtorizaciya.php" accesskey="3" title="">Авторизация</a></li>
				<li><a href="info.php" accesskey="4" title="">Основная информация</a></li>
				<li><a href="kontakty.php" accesskey="5" title="">Контакты</a></li>
			</ul>
		</div>
	</div>
<?php
       $host="localhost";
    $user="zettrap";
    $pass="199907zetTrap";
    $db_name="my_bd_zaytsev";
    $link=mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db_name);

	//if (isset($_POST['login']) && isset($_POST['password']))	
	if(isset($_POST['submit']))
        {
          $err=array();

          if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))
          {
            $err[]="Логин может состоять только из букв английского алфавита и цифр";
          }

          if(strlen($_POST['login'])<3 or strlen($_POST['login'])>32)
          {
            $err[] = "Логин должен быть не меньше 3-х символов и не больше 32";
          }

         $query = "SELECT * FROM users WHERE login=`".mysqli_real_escape_string($_POST[`login`]);

		 

          if(mysqli_result($query, 0) > 0)
          {
            $err[] = "Пользователь с таким логином уже существует в базе данных";
          }

          if(strlen($_POST['Email'])<1)
          {
            $err[]= "Введите E-mail";
          }

          if(count($err) == 0)
          {
            $login = $_POST['login'];
            $password = trim($_POST['password']);
            $Email = $_POST['Email'];
            $pol = $_POST['pol'];
            mysqli_query($link,"INSERT INTO users SET login='".$login."', password='".$password."', email='".$Email."', pol='".$pol."'");
            echo 'Перейти к <a href="avtorizaciya.php">авторизации</a>';
          }

          else
          {
              echo "При регистрации произошли следующие ошибки:<br>";

              foreach($err AS $error)
              {
                  echo $error;
              }
          }
        }
   //$sql = mysqli_query($link,$query) or die(mysqli_error($link));
    if (mysqli_num_rows($query) == 1) 
		
	{	
        $row = mysqli_fetch_assoc($query);
        $_SESSION['user_id'] = $row['id'];
		 $_SESSION['user_per'] = $row['prava'];
		if ($_SESSION['user_per']=="admin")
		{
	header ('location: admin.php');
	echo 'Вы вошли, как админ '.$_POST['login'].' войдите в <a href="admin.php">личный кабинет</a>';
		}
		if ($_SESSION['user_per']=="user")
		{
		header ('location: user.php');
		echo 'Вы вошли, как пользователь '.$_POST['login'].' войдите в <a href="user.php">личный кабинет</a>';
		}
	}	
    else {
      die('Неверное имя пользователя или пароль');	
    }
?>

<form method="post">
<input type="text" name="login" placeholder='Логин'><br><br>
<input type="password" name="password" placeholder='Пароль'><br><br>
 <input type='email' name='Email' placeholder='email'>
<br> <br> Выберите пол:&nbsp;&nbsp;
            <select name='pol'>
              <option value='0'>Не указан</option>
              <option value='1'>Мужской</option>
              <option value='2'>Женский</option>
            </select>
 <br><br><input type="submit" name="submit" value="Зарегистрироваться" />
</form>


	<div id="portfolio-wrapper">
		<div id="portfolio" class="container">
			<div class="title">
				<h2>Бизнес по продаже бахил</h2>
				<span class="byline">производство и продажа</span> </div>
			<div class="column1">
				<div class="box">
					<h3>Скидки</h3>
					<p>На странице указаны скидки.</p>
					<a href="#" class="button">Скидки</a> </div>
			</div>
			<div class="column2">
				<div class="box">
					<h3>Доставка и оплата</h3>
					<p>Доставка по РФ бесплатная.</p>
					<a href="#" class="button">Доставка и оплата</a> </div>
			</div>
			<div class="column3">
				<div class="box">
					<h3>Оптовикам</h3>
					<p>Инструкции оптовикам по покупке.</p>
					<a href="#" class="button">Оптовикам</a> </div>
			</div>
			<div class="column4">
				<div class="box">
					<h3>О магазине</h3>
					<p>Информация о магазине.</p>
					<a href="#" class="button">О магазине</a> </div>
			</div>
		</div>
	</div>
</div>
<div id="footer">
	<p>&copy; zettrap</p>
</div>
</body>
</html>