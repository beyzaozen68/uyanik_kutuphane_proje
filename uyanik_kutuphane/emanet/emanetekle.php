<?php
include("../function.php");


if ($_POST) {
  if(Addtemp($_POST["musteri"],$_POST["telno"],$_POST["salonno"],$_POST["masano"],$_POST["zaman"],$_POST['kitapadi'])){
      header("Location:/emanet/emanetListesi.php?warning=success"); 
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

<link rel="stylesheet" href="../css/oduncekleStyle.css">

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
  display: -ms-flexbox; /* IE10 */
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

/* Set a style for the submit button */
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

  <h2>Ödünç Kitap Kayıt</h2>

  

  <div class="input-container">
    <div class="label-container"></div>
    
    <head><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    </head>
    
      <div id="box">
        <select class="kitapadi" name="kitapadi">
          <?php foreach(Getbooklist() as $bookid=>$bookval):?>
           <option value="<?=$bookval['kitap_id'];?>"><?=$bookval['kitap_ad'];?></option>
          <?php endforeach;?>
      </select>
      </div>

  <div class="input-container">
    <input class="input-field" type="text" placeholder="Ödünç Alacak Kişinin Adı" name="musteri">
  </div>

  <div class="input-container">
    <input class="input-field" type="tel" placeholder="Telefon Numarası" name="telno">
  </div>


  <div class="input-container">
    <input class="input-field" type="text" placeholder="Salon Numarası" name="salonno">
  </div>
  
  <div class="input-container">
    <input class="input-field" type="text" placeholder="Masa Numarası" name="masano">
  </div>

  <div class="input-container">
    <input class="input-field" type="time" placeholder="Ödünç Verme Zamanı" name="zaman">
  </div>

  <button type="submit" class="btn">Kaydet</button>
</form>

</body>
</html>