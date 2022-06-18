<?php
$a = 2;
$name = filter_var(trim($_POST['name']), 
FILTER_SANITIZE_STRING);
$surname = filter_var(trim($_POST['surname']), 
FILTER_SANITIZE_STRING);
$phoneNumber = filter_var(trim($_POST['phoneNumber']), 
FILTER_SANITIZE_STRING);
$favDishes = filter_var(trim($_POST['favDishes']), 
FILTER_SANITIZE_STRING);
$phobia = filter_var(trim($_POST['phobia']), 
FILTER_SANITIZE_STRING);
$brand = filter_var(trim($_POST['brand']), 
FILTER_SANITIZE_STRING);
$favGame = filter_var(trim($_POST['favGame']), 
FILTER_SANITIZE_STRING);
$drink = filter_var(trim($_POST['drink']), 
FILTER_SANITIZE_STRING);
$city = filter_var(trim($_POST['city']), 
FILTER_SANITIZE_STRING);
$film = filter_var(trim($_POST['film']), 
FILTER_SANITIZE_STRING);
$lifestyle = filter_var(trim($_POST['lifestyle']), 
FILTER_SANITIZE_STRING);
$username = filter_var(trim($_POST['username']), 
FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']), 
FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']), 
FILTER_SANITIZE_STRING);
$repPass = filter_var(trim($_POST['repPass']), 
FILTER_SANITIZE_STRING);

if(mb_strlen($username)<3 || mb_strlen($username)>90) {
    echo "Логін користувача повинен бути більший за 3, та менший за 90";
    echo '<br>';
    echo 'Щоб вийти, натиснтіь  <a href="/exit.php">тут</a>';
    exit();
} else if(mb_strlen($pass)<3 || mb_strlen($pass)>1000) {
    echo "Пароль користувача повинен бути більший за 3, та менший за 50";
    echo '<br>';
    echo 'Щоб вийти, натиснтіь  <a href="/exit.php">тут</a>';
    exit();}
        else if(mb_strlen($email)<5 || mb_strlen($email)>50) {
        echo "Пошта користувача повинен бути більша за 5, та менша за 50";
        echo '<br>';
        echo 'Щоб вийти, натиснтіь  <a href="/exit.php">тут</a>';
         exit();}
         else if(mb_strlen($name)<1) {
            echo "Заповніть будь ласка усі поля";
            echo '<br>';
            echo 'Щоб вийти, натиснтіь  <a href="/exit.php">тут</a>';
             exit();}
             else if(mb_strlen($surname)<1) {
                echo "Заповніть будь ласка усі поля";
                echo '<br>';
                echo 'Щоб вийти, натиснтіь  <a href="/exit.php">тут</a>';
                 exit();}
                 else if(mb_strlen($phoneNumber)<1) {
                    echo "Заповніть будь ласка усі поля";
                    echo '<br>';
                    echo 'Щоб вийти, натиснтіь  <a href="/exit.php">тут</a>';
                     exit();}
                     else if(mb_strlen($favDishes)<1) {
                        echo "Заповніть будь ласка усі поля";
                        echo '<br>';
                        echo 'Щоб вийти, натиснтіь  <a href="/exit.php">тут</a>';
                         exit();}
                         else if(mb_strlen($phobia)<1) {
                            echo "Заповніть будь ласка усі поля";
                            echo '<br>';
                            echo 'Щоб вийти, натиснтіь  <a href="/exit.php">тут</a>';
                             exit();}
                             else if(mb_strlen($brand)<1) {
                                echo "Заповніть будь ласка усі поля";
                                echo '<br>';
                                echo 'Щоб вийти, натиснтіь  <a href="/exit.php">тут</a>';
                                 exit();}
                                 else if(mb_strlen($favGame)<1) {
                                    echo "Заповніть будь ласка усі поля";
                                    echo '<br>';
                                    echo 'Щоб вийти, натиснтіь  <a href="/exit.php">тут</a>';
                                     exit();}
                                     else if(mb_strlen($drink)<1) {
                                        echo "Заповніть будь ласка усі поля";
                                        echo '<br>';
                                        echo 'Щоб вийти, натиснтіь  <a href="/exit.php">тут</a>';
                                         exit();}
                                         else if(mb_strlen($city)<1) {
                                            echo "Заповніть будь ласка усі поля";
                                            echo '<br>';
                                            echo 'Щоб вийти, натиснтіь  <a href="/exit.php">тут</a>';
                                             exit();}
                                             else if(mb_strlen($film)<1) {
                                                echo "Заповніть будь ласка усі поля";
                                                echo '<br>';
                                                echo 'Щоб вийти, натиснтіь  <a href="/exit.php">тут</a>';
                                                 exit();}
                                                 else if(mb_strlen($lifestyle)<1) {
                                                    echo "Заповніть будь ласка усі поля";
                                                    echo '<br>';
                                                    echo 'Щоб вийти, натиснтіь  <a href="/exit.php">тут</a>';
                                                     exit();}

             
    
if($pass != $repPass){
    echo "Паролі не співпадають";
    echo '<br>';
    echo 'Щоб вийти, натиснтіь  <a href="/exit.php">тут</a>';
    exit();
    
}



 for($i = 0; $i<strlen($pass);$i++){
   $value[$i] = unpack('H*', $pass[$i]);
   $dec[$i] =  base_convert($value[$i][1], 16, 2);
   
   $dec[$i] = strval($dec[$i]).'4';
   $dec[$i]=$dec[$i]/$a;
    }
   $strPass = json_encode($dec);
   $comma_separated = implode(",", $dec);
   $cryptopass = str_replace(',', "",$comma_separated);




$mysql = new mysqli('localhost','root','root','register-db','8889');
$mysql->query("INSERT INTO `users`(`email`, `pass`, `name`,`surname`,`username`,`film`,`phoneNumber`,`favDishes`,`phobia`,`brand`,`favGame`,`drink`,`city`,`lifestyle`) 
VALUES('$email','$cryptopass','$name','$surname','$username','$film','$phoneNumber','$favDishes','$phobia','$brand','$favGame','$drink','$city','$lifestyle')");
$mysql->close();
header('Location: /index.php');
    
    ?>
    
    
  