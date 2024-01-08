<?php
include("../function.php");

$message = null;

if($_POST){

  if($_POST['cmd'] == 'del'){
    $id = $_POST['talepid'];
    $talep_delete = $db->prepare("delete from talep where talep_no = ?");
    $talep_exec = $talep_delete->execute([$id]);
    if($talep_exec){
      $message =  'Silme İşlemi Başarılı';
    }else{
      $message = "Bir Hata Oluştu";
    }
  }
  if($_POST['cmd'] == 'Ret'){
      $id = $_POST['talepid'];
      $talep_delete = $db->prepare("UPDATE  talep set talep_durum='Reddedildi' where talep_no = ?");
      $talep_exec = $talep_delete->execute([$id]);
      if($talep_exec){
        $message =  '';
      }else{
        $message = "";
      }
  }
  if($_POST['cmd'] == 'Onay'){
    $id = $_POST['talepid'];
    $talep_delete = $db->prepare("UPDATE  talep set talep_durum='Onaylandı' where talep_no = ?");
    $talep_exec = $talep_delete->execute([$id]);
    if($talep_exec){
      $message =  '';
    }else{
      $message = "";
    }
  }
  if($_POST['cmd'] == 'Bekleme'){
      $id = $_POST['talepid'];
      $talep_delete = $db->prepare("UPDATE  talep set talep_durum='Beklemede' where talep_no = ?");
      $talep_exec = $talep_delete->execute([$id]);
      if($talep_exec){
        $message =  '';
      }else{
        $message = "";
      }
  }
}
?>
<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Oswald:wght@500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/indexStyle.css">

<style>
h1{
  font-family: Arial, Helvetica, sans-serif;
}

#talep {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#talep td, #talep th {
  border: 1px solid #ddd;
  padding: 8px;
}

#talep tr:nth-child(even){background-color: #f2f2f2;}

#talep tr:hover {background-color: #ddd;}

#talep th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #5f7cc6;
  color: white;
}
</style>
</head>
<body>

  <div align ="center"><h2>Talep Edilen Kitapların Listesi</h2>
  <h5><?=$message;?></h5></div>

<nav>
  <a href="talepekle.php" class="buton"><i class="fa-solid fa-right-to-bracket icon"></i>Talep Oluştur</a>
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

<table id="talep">
  <tr>
    <th>No</th>
    <th>Talep Edilen Kitap Adı</th>
    <th>Yazar Adı</th>
    <th>Tür Adı</th>
    <th>Talep Edilme Tarihi</th>
    <th>Talep Sonucu</th>
    <th>Talep Kontrol</th>
    <th>İşlem</th>
  </tr>
  <?php foreach ( Requestlist() as $key => $value) :  ?>
  <tr>
    <td><?=$value["talep_no"]?></td>
    <td><?=$value["talep_kitap_adi"]?></td>
    <td><?=$value["yazaradi"]?></td>
    <td><?=$value["tur_ad"]?></td>
    <td><?=$value["taleptarihi"]?></td>
    <td><?=$value["talep_durum"]?></td>
    <td>
      <div id="Ret">
          <form method="post" action="#"> 
            <input type="hidden" name="cmd" value="Ret">
            <input type="hidden" name="talepid" value="<?=$value['talep_no']?>">
           <input type="submit" value="Ret">  
        </form>
      </div>
      <div id="Onay">
          <form method="post" action="#"> 
            <input type="hidden" name="cmd" value="Onay">
            <input type="hidden" name="talepid" value="<?=$value['talep_no']?>">
           <input type="submit" value="Onay">  
        </form>
      </div>
      <div id="Bekleme">
          <form method="post" action="#"> 
            <input type="hidden" name="cmd" value="Bekleme">
            <input type="hidden" name="talepid" value="<?=$value['talep_no']?>">
           <input type="submit" value="Beklemede">  
        </form>
      </div>
    </td>
    <td>
      <div id="del">
          <form method="post" action="#"> 
            <input type="hidden" name="cmd" value="del">
            <input type="hidden" name="talepid" value="<?=$value['talep_no']?>">
           <input type="submit" value="Sil">  
        </form>
      </div>
    </td>
  </tr>
  <?php endforeach; ?>
</table>

</body>
<script>
$(document).ready(function(){
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#talep tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

</html>