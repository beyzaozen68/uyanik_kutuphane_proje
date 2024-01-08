<?php
include("../function.php");

if(isset($_POST['del']) && !empty($_POST['bookid'])){
  if(deleteBookfromLibrary($_POST['bookid'])){
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
#arsiv {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
h1{
  font-family: Arial, Helvetica, sans-serif;
}

#arsiv td, #arsiv th {
  border: 1px solid #ddd;
  padding: 8px;
}

#arsiv tr:nth-child(even){background-color: #f2f2f2;}

#arsiv tr:hover {background-color: #ddd;}

#arsiv th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #5f7cc6;
  color: white;
}
</style>
</head>
<body>

<div align ="center"><h2 style="font-size: 25px;">Kütüphane Arşivi</h2> </div>

<nav>
  <a href="kitapekle.php" class="buton"><i class="fa-solid fa-right-to-bracket icon"></i>Yeni Kitap Ekle</a>
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

<table id="arsiv">
  <tr>
    <th>No</th>
    <th>Kitap Adı</th>
    <th>Yazar Adı</th>
    <th>Kitap Türü</th>
    <th>Kitaplık No</th>
    <th>Raf No</th>
    <th>Durum</th>
    <th>İşlem</th>
  </tr>
  <?php foreach ( Getbooklist() as $key => $value) : ?>
  <tr>
    <td><?=$value["kitap_id"]?></td>
    <td><?=$value["kitap_ad"]?></td>
    <td><?=$value["yazaradi"]?></td>
    <td><?=$value["tur_ad"]?></td>
    <td><?=$value["kitaplik_no"]?></td>
    <td><?=$value["raf_no"]?></td>
    <td><?=($value["emanet_durumu"] ? 'Dolu' : 'Rafta') ?></td>
    <td>
   <form method="post" action="#">
      <input type="hidden" name="bookid" value="<?=$value['kitap_id'];?>" >
        <input type="submit" name="del" value="Sil" >
    </form>
    <form method="get" action="kitapguncelle.php">
     <input type="hidden"  name="book_id" value=<?=$value['kitap_id'];?>>
      <input type="submit"  value="Güncelle">
</form>
</td>

  </tr>
  <?php endforeach; ?>
</table>

<script>
$(document).ready(function(){
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#arsiv tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>


</body>
</html>