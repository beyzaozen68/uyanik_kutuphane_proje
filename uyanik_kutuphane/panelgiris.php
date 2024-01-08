<?php
include("function.php");


if ($_POST) {
    if(Logincheck($_POST["kullanici_adi"],$_POST["sifre"])){
        $_SESSION['login'] = 1;
        header("Location:/anasayfa.php");
        
    }
    else {
        $error = "HATA";
    }
}

if(isset($_SESSION['login']) && @$_SESSION['login'] ){
    header("Location:/anasayfa.php");
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Girişi</title>
    <link rel="stylesheet" href="css/loginStyle.css">
</head>
<body>

    <form action="panelgiris.php" method="post">
        <h2>Kullanıcı Girişi</h2>
        <h4><?php echo $error;?></h4>
        <input type="text" name="kullanici_adi" placeholder="Kullanıcı Adı" autocomplete="false">
        <input type="password" name="sifre" placeholder="Şifre">
        <input type="submit" value="Giriş Yap">
    </form>
    
</body>
</html>

