<?php
include("../function.php");
$mesaj = null;
if ($_POST) {
  if (Addrequest($_POST["kitap"],$_POST["yazar"],$_POST["tarih"],$_POST["tur"])) {
    header("Location:/talep/taleplistesi.php?warning=success"); 
  }else {
    $mesaj = "Talebiniz Alınamamıştır.";
  }
}

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="../css/talepStyle.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Oswald:wght@500&display=swap" rel="stylesheet">

<style>
body {font-family: Arial, Helvetica, sans-serif;
      background: #262626 url(../img/library.jpg);
      background-size: cover;
      margin: 0;
      display: flex;
      align-items: center;
      justify-content: center; 
      height: 80vh
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


/* Set a style for the submit button */
.btn {
  background-color: dodgerblue;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}
.icon {
  padding: 10px;
  background: rgb(0, 0, 0);
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
  border: 2px solid rgb(0, 0, 0);
}

.btn:hover {
  opacity: 1;
}

.kitap{
  display: -ms-flexbox;
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}
</style>
</head>
<body>

<form action="#" method="post" style="max-width:500px;margin:auto">

  <h2>Kitap Talebi Formu</h2>
  <h4 style="color:white;"><?php echo $mesaj;?></h4>


  <div class="input-container">
    <input class="input-field" type="text" placeholder="Kitabın adı" name="kitap">
  </div>

  <div class="input-container">
    <input class="input-field" type="text" placeholder="Yazar adı" name="yazar">
  </div>

  <div class="input-container">
    <input class="input-field" type="date" placeholder="Talep edilme tarihi" name="tarih">
  </div>

  <div class="input-container">
    <div class="label-container">
        <label for="kitap">Kitabın Türünü Seçiniz:</label>
    </div>
    <div class="select-container">
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
</div>

  <button type="submit" class="btn">Kaydet</button>
</form>

</body>
</html>