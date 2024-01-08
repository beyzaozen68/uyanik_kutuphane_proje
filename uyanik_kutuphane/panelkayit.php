<?php
include("function.php");
if ($_POST) {
    if(Register($_POST["kullanici_adi"],$_POST["sifre"],$_POST["personel_ad"], $_POST["personel_soyad"])){
        header("Location:/panelgiris.php");
    }
    else {
        $error = "kullanici mevcut";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullacı Kayıt</title>
    <link rel="stylesheet" href="css/registerStyle.css">
</head>
<body>

    <form action="panelkayit.php" method="post">
        <h2>Kullanıcı Kayıt</h2>
        <h4><?php echo $error;?></h4>
        <input type="text" name="personel_ad" placeholder="Ad">
        <input type="text" name="personel_soyad" placeholder="Soyad">
        <input type="text" name="kullanici_adi" placeholder="Kullanıcı Adı" autocomplete="false">
        <input type="password" name="sifre" placeholder="Parola">
        <input type="submit" value="Kayıt Oluştur">
    </form>
    
</body>
</html>

