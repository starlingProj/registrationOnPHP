<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive title</title>
    <link rel ="stylesheet" type="text/css" href="styles/style.css">
   
    <script async src="/script.js"></script>
</head>
<body>
    <?php
    if($_COOKIE['user'] == ''):
    ?>
    <div class="container">
        <div class="blueBg">
            <div class="box signin">
                <h2>Вже маєте акаунт?</h2>
                <button class="signinBtn">Авторизація</button>
            </div>
            <div class="box signup">
                <h2>Не маєте акаунт?</h2>
                <button class="signupBtn">Реєстрація</button>
            </div>
        </div>
        <div class="formBx">
            <div class="form signinForm">
                <form action ="auth.php" method="post" >
                    <?php
                        if($_COOKIE['try'] < 5):
                    ?>
                    <h3 class='signin'>Авторизація</h3>
                    <input autocomplete ="off" type="text" placeholder="Логін" name ="username"> 
                    <input autocomplete ="off" type="password" placeholder="Пароль"  name ="authpass">
                    <input type="submit" value="Увійти">
                    <a href="/forgot_pass.php" class="forgot">Забули пароль?</a>
                    <?php
                    if($_SESSION['message']){
                        echo '<p> ' . $_SESSION['message'] . ' </p>';
                        $try=$_COOKIE['try']+1 ;
                        setcookie('try',$try, time() +300);
                        echo '<p> ' . $try . ' спроб заходження </p>'; ;
                    }
                    unset($_SESSION['message']);
                   
                    ?>
                    <?php else: ?>
                        <div class ='blocked'><p>Ви були заблоковані на 5 хвилин<p></div>
                        
                        
                        
                   <?php endif; ?>
                     
                    
                </form>
            </div>

            <div class="form signupForm">
                <form action="check.php" method="post" >
                    <h3 class='signup'>Реєстрація</h3>
                    <input autocomplete ="off" type="text" placeholder="Ім'я" name="name" > 
                    <input autocomplete ="off" type="text" placeholder="Прізвище" name="surname"> 
                    <input autocomplete ="off" type="text" placeholder="Логін" name="username" id="username"> 
                    <input autocomplete ="off" type="text" placeholder="Електронна пошта" name="email"> 
                    <input autocomplete ="off" type="text" placeholder="Номер телефону" name="phoneNumber">
                    <input autocomplete ="off" type="password" placeholder="Пароль" name="pass" id="pass"> 
                    <input autocomplete ="off" type="password" placeholder="Повторіть пароль" name="repPass" id ="repPass">
                    <input autocomplete ="off" type="text" placeholder="Улюблена страва" name="favDishes" > 
                    <input autocomplete ="off" type="text" placeholder="Ваша фобія" name="phobia"> 
                    <input autocomplete ="off" type="text" placeholder="Бренд телефону" name="brand"> 
                    <input autocomplete ="off" type="text" placeholder="Улюблена гра" name="favGame"> 
                    <input autocomplete ="off" type="text" placeholder="Улюблений напій" name="drink"> 
                    <input autocomplete ="off" type="text" placeholder="Місце народження" name="city"> 
                    <input autocomplete ="off" type="text" placeholder="Улюблений фільм" name="film"> 
                    <input autocomplete ="off" type="text" placeholder="Чи ведете здоровий спосіб життя" name="lifestyle"> 
                    <input  type="submit" value="Зареєструватися" id="submit">
                </form>
            </div>
        </div>
    </div>
    <?php else: ?>
        <h3>Привіт <?=$_COOKIE['user']?>. Щоб вийти, натиснтіь  <a href="/exit.php">тут</a></h3>
        <br>
        <h3>&nbsp Твоя роль -&nbsp<?=$_COOKIE['role']?></h3>
    <?php endif; ?>
</body>
</html>