<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Авторизация</title>
<meta name='keywords' content='' />
<meta name='description' content='' />
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' />
<link href='default.css' rel='stylesheet' type='text/css' media='all' />
<link href='fonts.css' rel='stylesheet' type='text/css' media='all' />
		<link rel='shortcut icon' href='images/logo.png' type='image/png'>
<!--[if IE 6]>
<link href='default_ie6.css' rel='stylesheet' type='text/css' />
<![endif]-->
</head>
<body>
<div id='wrapper'>
	<div id='header-wrapper'>
		<div id='header' class='container'>
			<div id='logo'>
				<h1><a href='index.php'>Bahilistich</a></h1>
			</div>
			<div id='social'>
				<ul class='contact'>
					<li><a href='#' class='icon icon-twitter'><span>Twitter</span></a></li>
					<li><a href='#' class='icon icon-facebook'><span>facebook</span></a></li>
					<li><a href='#' class='icon icon-dribbble'><span>Pinterest</span></a></li>
					<li><a href='#' class='icon icon-tumblr'><span>Google+</span></a></li>
					<li><a href='#' class='icon icon-rss'><span>Pinterest</span></a></li>
				</ul>
			</div>
		</div>
		<div id='menu' class='container'>
			<ul>
				<li ><a href='index.php' accesskey='1' title=''>Главная</a></li>
				<li><a href='news.php' accesskey='1' title=''>Отзывы</a></li>
				<li><a href='gost.php' accesskey='2' title=''>Написать отзыв</a></li>
				<li class='current_page_item'><a href='avtorizaciya.php' accesskey='3' title=''>Авторизация</a></li>
				<li><a href='info.php' accesskey='4' title=''>Основная информация</a></li>
				<li><a href='kontakty.php' accesskey='5' title=''>Контакты</a></li>
			</ul>
		</div>
	</div>


<form action='avtorizaciya.php' method='post'>
 Логин: <input type='text' name='login' /><br><br>
 Пароль: <input type='password' name='password' /><br><br>
 <input type='submit' name='log_in' value='Войти' />
</form>

<?php 

       $host="localhost";
    $user="zettrap";
    $pass="199907zetTrap"; 
    $db_name="my_bd_zaytsev";
    $link=mysqli_connect($host,$user,$pass);
    mysqli_select_db($link,$db_name);

	//if (isset($_POST['login']) && isset($_POST['password']))	
	if (isset($_POST[`log_in`]))
	{
    $login = $_POST['login'];
    $password = $_POST['password'];
    $query ="SELECT id, password, login, prava FROM users WHERE login='".mysqli_real_escape_string($link,$login);
	$data=mysqli_fetch_assoc($query);
	
	if ($data[`password`]==$password)
	{
		
		$_SESSION[`id`]=$data['id'];
		echo "вы вошли как ".$data['login'].". "."Войдите в <a href=".$data['prava'].".php".">личный кабинет</a>";				
		
	}
	else {
      echo('Неверное имя пользователя или пароль');	
    }

	
	
	
	
    $sql = mysqli_query($link,$query) or die(mysqli_error($link));
    if (mysqli_num_rows($sql) == 1) 
	{	
        $row = mysqli_fetch_assoc($sql);
        $_SESSION['user_id'] = $row['id'];
		 $_SESSION['user_per'] = $row['prava'];
		if ($_SESSION['user_per']=="admin")
		{
	//header ('location: admin.php');
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
} 

?>

<br><br><a href='register.php' accesskey='1' title=''>Регистрация</a>
	<div id='portfolio-wrapper'>
		<div id='portfolio' class='container'>
			<div class='title'>
				<h2>Бизнес по продаже бахил</h2>
				<span class='byline'>производство и продажа</span> </div>
			<div class='column1'>
				<div class='box'>
					<h3>Скидки</h3>
					<p>На странице указаны скидки.</p>
					<a href='#' class='button'>Скидки</a> </div>
			</div>
			<div class='column2'>
				<div class='box'>
					<h3>Доставка и оплата</h3>
					<p>Доставка по РФ бесплатная.</p>
					<a href='#' class='button'>Доставка и оплата</a> </div>
			</div>
			<div class='column3'>
				<div class='box'>
					<h3>Оптовикам</h3>
					<p>Инструкции оптовикам по покупке.</p>
					<a href='#' class='button'>Оптовикам</a> </div>
			</div>
			<div class='column4'>
				<div class='box'>
					<h3>О магазине</h3>
					<p>Информация о магазине.</p>
					<a href='#' class='button'>О магазине</a> </div>
			</div>
		</div>
	</div>
</div>
<div id='footer'>
	<p>&copy; zettrap</p>
</div>
</body>
</html>