<?php
include("../function.php");

if($_POST){
  if(addattempt($_POST['denemead'],$_POST['denemetur'],$_POST['denemesatis'],$_POST['denemestok'],1)){
    header("Location:/deneme/denemelistesi.php");
  }
}


?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="../css/denemeStyle.css">

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

  <h2 style="font-size: 23px;">Deneme Ekleme Formu</h2> </div>

  <div class="input-container">
    <div class="label-container"></div>
    
    <head><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    </head>

  <div class="input-container">
    <input class="input-field" type="text" placeholder="Deneme Adı" name="denemead">
  </div>

  <div class="input-container">
    <input class="input-field" type="text" placeholder="Deneme Türü" name="denemetur">
  </div>

  <div class="input-container">
    <input class="input-field" type="text" placeholder="Satış Fiyatı" name="denemesatis">
  </div>

  <div class="input-container">
    <input class="input-field" type="text" placeholder="Toplam Stok Adedi" name="denemestok">
  </div>

  <button type="submit" class="btn">Kaydet</button>
</form>

</body>
</html>