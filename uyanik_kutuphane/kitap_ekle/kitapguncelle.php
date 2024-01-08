<?php
include("../function.php");
if(isset($_GET['book_id'])){

  if(is_array(getbookfromid($_GET['book_id']))){
    $bookinfo=getbookfromid($_GET['book_id']);
  }

  if(isset($_POST['saveupdate'])){
      if(UpdateBook($_POST['bookid'],$_POST['kitap'],$_POST['tur'],$_POST['kitaplik'],$_POST['raf'],$_POST['yazar'])){
        header("Location:/kitap_ekle/kutuphane.php");
      }
  }
}


?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="../css/kitapekleStyle.css">

<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background: #262626 url(../img/library.jpg);
   background-size: cover;
   display: flex;
   align-items: center;
   justify-content: center;
   min-height: 100vh;
}
h2 {
    color: rgb(255, 255, 255);
}

* {box-sizing: border-box;}

.input-container {
  
  display: flex;
  flex-direction: column;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
  padding: 10px;
  background: dodgerblue;
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid dodgerblue;
}


.btn {
  background-color: dodgerblue;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
  margin-top: 20px;
}

.btn:hover {
  opacity: 1;
}
</style>
</head>
<body>

<form action="#" method="post" style="max-width:500px;margin:auto">

 <h2 style="font-size: 25px;">Kitap Güncelle</h2> </div>
  <div class="input-container">
    
    <input class="input-field" type="text" placeholder="Kitap Adı" name="kitap" value="<?=$bookinfo["kitap_ad"]?>">
  </div>
  <div class="input-container">
    
    <input class="input-field" type="text" placeholder="Yazar Adı" name="yazar" value="<?=$bookinfo["yazaradi"]?>">
  </div>
  <div class="input-container">

    <input class="input-field" type="text" placeholder="Kitaplık No" name="kitaplik" value="<?=$bookinfo["kitaplik_no"]?>">
  </div>
  <div class="input-container">

    <input class="input-field" type="text" placeholder="Raf No" name="raf" value="<?=$bookinfo["raf_no"]?>">
    <input class="input-field" type="hidden" name="bookid" value="<?=$bookinfo["kitap_id"]?>">

  </div>
  <div class="input-container">

    <div class="label-container">

    <label for="kitap">Kitabın Türünü Seçiniz: </label>
  </div>
  
    <select class="tur" name="tur">
        <option value="1" <?=($bookinfo['tur_id'] == 1 ? "selected" : null); ?> >Kurgu</option>
        <option value="2" <?=($bookinfo['tur_id'] == 2 ? "selected" : null); ?>>Sanat</option>
        <option value="3" <?=($bookinfo['tur_id'] == 3 ? "selected" : null); ?>>Biyografi</option>
        <option value="4"<?=($bookinfo['tur_id'] == 4 ? "selected" : null); ?>> Felsefe</option>
        <option value="5"<?=($bookinfo['tur_id'] == 5 ? "selected" : null); ?>>Kişisel Gelişim</option>
        <option value="6"<?=($bookinfo['tur_id'] == 6 ? "selected" : null); ?>>Polisiye</option>
        <option value="7"<?=($bookinfo['tur_id'] == 7 ? "selected" : null); ?>>Psikolojik</option>
        <option value="8"<?=($bookinfo['tur_id'] == 8 ? "selected" : null); ?>>Bilim</option>
        <option value="9"<?=($bookinfo['tur_id'] == 9 ? "selected" : null); ?>>Tarih</option>
        <option value="10"<?=($bookinfo['tur_id'] == 10 ? "selected" : null); ?>>Macera</option>
        <option value="11"<?=($bookinfo['tur_id'] == 111 ? "selected" : null); ?>>Şiir</option>
        <option value="12"<?=($bookinfo['tur_id'] == 12 ? "selected" : null); ?>>Romantizm</option>
    </select>
  </div>

  <button type="submit"  name="saveupdate" class="btn">Kaydet</button>
</form>

</body>
</html>
