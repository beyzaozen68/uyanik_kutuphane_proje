<?php
include("../function.php");
if(isset($_POST['del']) && !empty($_POST['emanet_id'])){
  if(deleteBookfromTemp($_POST['emanet_id'])){
     $message = "Silme İşlemi Başarılı";
  }
}


?>
<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="../css/indexStyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Oswald:wght@500&display=swap" rel="stylesheet">

<style>
h1{
  font-family: Arial, Helvetica, sans-serif;
}

#list {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#list td, #list th {
  border: 1px solid #ddd;
  padding: 8px;
}

#list tr:nth-child(even){background-color: #f2f2f2;}

#list tr:hover {background-color: #f2f2f2;}

#list th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #5f7cc6;
  color: white;
}
</style>
</head>
<body>

  <div align="center"><h2>Ödünç Kitap Listesi</h2> </div>

<nav>
  <a href="emanetekle.php" class="buton"><i class="fa-solid fa-right-to-bracket icon"></i>Ödünç Kitap Ekle</a>
</nav>

<nav>
  <a href="http://localhost/anasayfa.php" class="buton"><i class="fa-solid fa-right-to-bracket icon"></i>Ana Sayfaya Dön</a>
</nav>

<head><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
</head>

<form>
  <div id="box">
      <input type="text" id="search" placeholder="Ara..">
      <i class="fa fa-search"></i>
  </div>
</form>

<table id="list">
  <tr>
    <th>No</th>
    <th>Kitap Adı</th>
    <th>Ödünç Alan Kişi</th>
    <th>Telefon</th>
    <th>Salon No</th>
    <th>Masa No</th>
    <th>Zaman</th>
    <th>İşlem</th>
  </tr>
  <?php
  
  foreach(templist() as $key => $value) : ?>
  <tr>
    <td><?=$value["emanet_id"]?></td>
    <td><?=$value["kitap_ad"]?></td>
    <td><?=$value["emanet_alan"]?></td>
    <td><?=$value["telno"]?></td>
    <td><?=$value["salonno"]?></td>
    <td><?=$value["masa_no"]?></td>
    <td><?=$value["emanet_tarihi"]?></td>
    <td>
    <form method="post" action="#">
      <input type="hidden" name="emanet_id" value="<?=$value['emanet_id'];?>" >
      <input type="submit" name="del" value="Sil" >
    </form>
  </td>
  </tr>
  <?php endforeach; ?>
</table>
<script>
$(document).ready(function(){
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#list tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</body>
</html>