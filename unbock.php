<?php
$submit = filter_var(trim($_POST['submit']), 
FILTER_SANITIZE_STRING);
setcookie('try',$try, time() -3600);



?>