<?php
session_start();
$counter = 0;
$a = 2;
$username = filter_var(trim($_POST['username']), 
FILTER_SANITIZE_STRING);
$authpass = filter_var(trim($_POST['authpass']), 
FILTER_SANITIZE_STRING);

 for($i = 0; $i<strlen($authpass);$i++){
    $value[$i] = unpack('H*', $authpass[$i]);
     $dec[$i] =  base_convert($value[$i][1], 16, 2);
     $dec[$i] = strval($dec[$i]).'4';
     $dec[$i]=$dec[$i]/$a;
     }
$strPass = json_encode($dec);
$comma_separated = implode(",", $dec);
$cryptopass = str_replace(',', "",$comma_separated);
$mysql = new mysqli('localhost','root','root','register-db','8889');

 $result = $mysql->query("SELECT * FROM `users` WHERE `username` = '$username' AND `pass` = '$cryptopass'");
 $user = $result->fetch_assoc();
 if(empty($user)){
     $_SESSION['message'] = 'Не вірний пароль, спробуйте ще раз';
     echo '<p> ' . $_SESSION['message'] . ' </p>';
     header('Location: /');
 }

setcookie('user', $user['name'], time() + 3600, "/");
setcookie('favDishes', $user['favDishes'], time() + 3600, "/");
setcookie('phobia', $user['phobia'], time() + 3600, "/");
setcookie('brand', $user['brand'], time() + 3600, "/");
setcookie('favGame', $user['favGame'], time() + 3600, "/");
setcookie('drink', $user['drink'], time() + 3600, "/");
setcookie('city', $user['city'], time() + 3600, "/");
setcookie('film', $user['film'], time() + 3600, "/");
setcookie('lifestyle', $user['lifestyle'], time() + 3600, "/");
setcookie('role', $user['role'], time() + 3600, "/");

 $mysql->close();
 header('Location: /');

 //





?>