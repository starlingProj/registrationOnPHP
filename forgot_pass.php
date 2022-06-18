
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Забули пароль?</title>
    <link rel ="stylesheet" type="text/css" href="styles/styleForgot.css">
</head>
<body>

        <div class="formBx">
            <div class="form signinForm">
                <form action ="recovery.php" method="post" >
                   
                    <h3 class='signin'>Відновити Пароль</h3>
                    <input autocomplete ="off" type="text" placeholder="Логін" name ="username"> 
                   <?
                    $arr[0] = '<input autocomplete ="off" type="text" placeholder="Улюблена страва" name="favDishes" >';
                    $arr[2] = '<input autocomplete ="off" type="text" placeholder="Ваша фобія" name="phobia"> ';
                    $arr[3] = '<input autocomplete ="off" type="text" placeholder="Бренд телефону" name="brand"> ';
                    $arr[4] = '<input autocomplete ="off" type="text" placeholder="Улюблена гра" name="favGame">';
                    $arr[5] = '<input autocomplete ="off" type="text" placeholder="Улюблений напій" name="drink"> ';
                    $arr[6] = '<input autocomplete ="off" type="text" placeholder="Місце народження" name="city"> ';
                    $arr[7] = '<input autocomplete ="off" type="text" placeholder="Улюблений фільм" name="film"> ';
                    $arr[1] = '<input autocomplete ="off" type="text" placeholder="Чи ведете здоровий спосіб життя" name="lifestyle">';
                    shuffle($arr);
                    echo $arr[0];
                
                    echo $arr[1];
                    
                    echo $arr[2];
                    
                    echo $arr[3];
                   

                    ?>
                    <input autocomplete ="off" type="password" placeholder="Введіть новий пароль" name="pass" id="pass"> 
                    <input autocomplete ="off" type="password" placeholder="Повторіть пароль" name="repPass" id ="repPass">
                    <input type="submit" value="Відновити пароль">
                    <a href="/index.php" class="forgot">Авторизація</a>

                        
                        
                
                     
                    
                </form>
            </div>

            
        </div>
</body>
</html>