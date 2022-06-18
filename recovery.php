<?php
$a = 2;
$arr3 = [];
$counter = 0;
$arr4 = [];
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
$pass = filter_var(trim($_POST['pass']), 
FILTER_SANITIZE_STRING);
$repPass = filter_var(trim($_POST['repPass']), 
FILTER_SANITIZE_STRING);
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

$arr1 =array('username','favDishes','phobia','brand','favGame','drink','city','film');
$arr = array($username,$favDishes,$phobia,$brand,$favGame,$drink,$city,$film);

for($i=0;$i<8;$i++){
if($arr[$i]==''){
unset($arr[$i]);
}
 else{
 $arr4[$counter]=$arr1[$i];
 $arr3[$counter]=$arr[$i];
 $counter++;

}

}
$mysql = new mysqli('localhost','root','root','register-db','8889');

 $result = $mysql->query("SELECT * FROM `users` WHERE `$arr4[0]` = '$arr3[0]' AND `$arr4[1]` = '$arr3[1]' AND `$arr4[2]` = '$arr3[2]' AND `$arr4[3]` = '$arr3[3]'");
 $user = $result->fetch_assoc();
 if(empty($user)){
     echo "Не вірно введені дані";
     exit();
    
 }
 $mysql->query("UPDATE `users` SET `pass` = '$cryptopass' WHERE `$arr4[0]` = '$arr3[0]'");
 $mysql->close();
echo "Ви успішно змінили пароль";
echo '<br>';
echo 'Щоб вийти, натиснтіь  <a href="/exit.php">тут</a>';
 

?>