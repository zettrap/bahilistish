<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Написать отзыв</title>
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
				<<li><a href='news.php' accesskey='1' title=''>Отзывы</a></li>
				<li><a href='gost.php' accesskey='2' title=''>Написать отзыв</a></li>
				<li><a href="avtorizaciya.php" accesskey="3" title="">Авторизация</a></li>
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
	
	

if ($_SESSION['id']>0)
{
	$query=mysqli_query($link,"SELECT login, email, pol FROM users WHERE id='".$_SESSION['id']."' ");
  $data=mysqli_fetch_assoc($query);
	echo "<form method='post'>
<h1>Введите свой отзыв</h1>
  <p>
  <label>Выберите категорию комментария:</label></br>
  <select name='category'>
	<option>Отзыв</option>
	<option>Жалоба</option>
	<option>Предложение</option>
</select>
  </p>
  <p>
    <label>Комментарий:</label>
    <br />
    <textarea name='komment' cols='50' rows='30'></textarea>
  </p>
  <p>
  <label>Подписка на новости:</label>
           <p>
		   <label>Да</label>
           <input type='radio' name='subscription' value='1' checked/>
	       <label>Нет</label>
	       <input type='radio' name='subscription' value='0' />
	      </p>
  </p>
  <p>
    <input type='submit' value='Отправить' name='add_q' />
  </p>
</form>";
	if(isset($_POST['add_q']))
{
$subscription=strip_tags($_POST['subscription']);
$komment=strip_tags($_POST['komment']);
$category=strip_tags($_POST['category']);
$data_k = date("Y-n-j");
mysqli_query($link,"INSERT INTO komments SET name='".$data['login']."', e_mail='".$data['email']."', komment='".$komment."', pol='".$data['pol']."', category='".$category."', subscription='".$subscription."',  data_k='".$data_k."'");
echo "<h3>Ждите пока администратор не проверит ваш комментарий</h3>
        ";
}
}
else
{
	echo "<form method='post'>
<h1>Введите свой отзыв</h1>
<p>
    <label>Имя:</label></br>
    <input type='text' name='name' required />
  </p>
  <p>
    <label>E-mail:</label></br>
    <input type='email' name='e_mail' />
  </p>
  <p>
  <label>Выберите пол:</label>
     <p>
	    <label>Мужской</label>
           <input type='radio' checked value='1' name='pol'>
        <label>Женский</label>
           <input type='radio' checked value='2' name='pol'>
     </p>
  </p>
  <p>
  <label>Выберите категорию комментария:</label></br>
  <select name='category'>
	<option>Отзыв</option>
	<option>Жалоба</option>
	<option>Предложение</option>
</select>
  </p>
  <p>
    <label>Комментарий:</label>
    <br />
    <textarea name='komment' cols='50' rows='30'></textarea>
  </p>
  <p>
  <label>Подписка на новости:</label>
           <p>
		   <label>Да</label>
           <input type='radio' name='subscription' value='1' checked/>
	       <label>Нет</label>
	       <input type='radio' name='subscription' value='0' />
	      </p>
  </p>
  <p>
    <input type='submit' value='Отправить' name='add_q' />
  </p>
</form>";
if(isset($_POST['add_q'])) 
{ 
$name=strip_tags($_POST['name']); 
$e_mail=strip_tags($_POST['e_mail']); 
$subscription=strip_tags($_POST['subscription']); 
$komment=strip_tags($_POST['komment']); 
$pol=strip_tags($_POST['pol']); 
$category=strip_tags($_POST['category']); 
$data_k = date("Y-n-j");

mysqli_query($link,"INSERT INTO komments SET name='".$name."', e_mail='".$e_mail."', komment='".$komment."', pol='".$pol."', category='".$category."', subscription='".$subscription."', data_k='".$data_k."'");
 
}
} 
?>

<h3> Одобренные отзывы </h3> <br>
<?php
    $sql = mysqli_query($link, "SELECT * FROM `komments`");
    while ($result = mysqli_fetch_array($sql)) {
		if (($result['pol']==1) or ($result['pol']==0))
  {
    echo  $result['name']." написал комментарий:";
  }
  elseif ($result['pol']==2)
  {
    echo $result['name']." написала комментарий:";
  }
		echo "<br>Почта: ".$result['e_mail']." <br>";
		echo "Дата: ".$result['data_k']." <br>";
		echo "Категория: ".$result['category']." <br>";
		echo "Комментарий: ".$result['komment']." <br>"."<br>";
		echo "<hr>";
		}
?>

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
