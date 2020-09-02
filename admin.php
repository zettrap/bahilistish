<?php 
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Админ</title> 
</head>
 <body>
<?php $host="localhost";
    $user="zettrap";
    $pass="199907zetTrap"; 
    $db_name="my_bd_zaytsev";
    $link=mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db_name);
echo "Привет admin";
?>
<h1>Панель управления комментариями:</h1></br> 
<?php 
$sql = mysqli_query($link,"SELECT * FROM `komments`"); 
while ($result = mysqli_fetch_array($link,$sql)) 
{ 
echo "Номер: ".$result['id']." <br>"; 
echo "Комментарий: ".$result['komment']." <br>"; 

if ($result['approval']=="0") 
{ 
echo "Комментарий не просмотрен <br>"."<br>"."<form method='POST'>"."<input type='submit' value='Одобрить' name='app1_".$result['id']."'>"." "."<input type='submit' value='Отклонить' name='app2_".$result['id']."'>"."</form>"."<br>"; 
} 
if ($result['approval']=="1") 
{ 
echo "Комментарий одобрен <br>"."<br>"."<form method='POST'>"."<input type='submit' value='Отклонить' name='app2_".$result['id']."'>"."</form>"."<br>"; 
} 

if ($result['approval']=="2") 
{ 
echo "Комментарий отклонен <br>"."<br>"."<form method='POST'>"."<input type='submit' value='Одобрить' name='app1_".$result['id']."'>"."</form>"."<br>";  
} 

if(isset($_POST["app1_".$result['id'].""])) 
{ 
mysqli_query($link,"UPDATE komments SET approval='1' WHERE id='".$result['id']."'"); 
echo "Комментарий ".$result['id']." одобрен"; 
} 
if(isset($_POST["app2_".$result['id'].""])) 
{ 
mysqli_query($link,"UPDATE komments SET approval='2' WHERE id='".$result['id']."'"); 
echo "Комментарий ".$result['id']." отклонен"; 
} 
Echo "<hr>";
}
echo date("Y-n-j");
?>