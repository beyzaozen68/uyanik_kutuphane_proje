<?php
include("../function.php");
if ($_POST) {
  if(Addbook($_POST["kitap"],$_POST["tur"],$_POST["kitaplik"],$_POST["raf"],$_POST["yazar"])){
      header("Location:/kitap_ekle/kutuphane.php?warning=success"); 
  }

  else {
      $error = "HATA";
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
  margin-bottom: 10px;
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

 <h2 style="font-size: 25px;">Kitap Ekleme Formu</h2> </div>
  <div class="input-container">
    
    <input class="input-field" type="text" placeholder="Kitap Adı" name="kitap">
  </div>
  <div class="input-container">
    
    <input class="input-field" type="text" placeholder="Yazar Adı" name="yazar">
  </div>
  <div class="input-container">

    <input class="input-field" type="text" placeholder="Kitaplık No" name="kitaplik">
  </div>
  <div class="input-container">

    <input class="input-field" type="text" placeholder="Raf No" name="raf">
  </div>
  <div class="input-container">

    <div class="label-container">

    <label for="kitap">Kitabın Türünü Seçiniz: </label>
  </div>
  
    <select class="tur" name="tur">
        <option value="1">Kurgu</option>
        <option value="2">Sanat</option>
        <option value="3">Biyografi</option>
        <option value="4">Felsefe</option>
        <option value="5">Kişisel Gelişim</option>
        <option value="6">Polisiye</option>
        <option value="7">Psikolojik</option>
        <option value="8">Bilim</option>
        <option value="9">Tarih</option>
        <option value="10">Macera</option>
        <option value="11">Şiir</option>
        <option value="12">Aşk Romanı</option>
    </select>
  </div>

  <button type="submit" class="btn">Kaydet</button>
</form>

</body>
</html>
