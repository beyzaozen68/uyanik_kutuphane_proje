<?php 
include("../function.php");

$message = null;
if($_POST){

  if(isset($_POST['del'])){
      $id = $_POST['denemeid'];
      $deneme_del = $db->prepare("delete from deneme where deneme_id = ?");
      $deneme_exec = $deneme_del->execute([$id]);
      if($deneme_del){
        $message =  'Silme İşlemi Başarılı';
      }else{
        $message = "Bir Hata Oluştu!";
      }
  }
  if(isset($_POST['in'])){
    $id = $_POST['stockincrease'];
    $deneme_del = $db->prepare("update deneme  set stok_adedi = stok_adedi - 1 where  deneme_id = ?");
    $deneme_exec = $deneme_del->execute([$id]);
    if($deneme_del){
      $message =  'Stok Azaltıldı';
    }else{
      $message = "Bir Hata Oluştu!";
    }
}
}
?>
<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="../css/indexStyle.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

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

  <div align ="center"><h2>Deneme Listesi</h2>
  <h5><?=$message;?></h5></div>

<nav>
  <a href="denemeekle.php" class="buton"><i class="fa-solid fa-right-to-bracket icon"></i>Deneme Ekle</a>
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
    <th>Deneme Adı</th>
    <th>Deneme Türü</th>
    <th>Satış Fiyatı</th>
    <th>Stok Adedi</th>
    <th>İşlem</th>
  </tr>

  <?php foreach ( GetattemptList()  as $key => $value) : ?>
  <tr>
    <td><?=$value["deneme_id"] ?></td>
    <td><?=$value["denemead"]?></td>
    <td><?=$value["deneme_tur"]?></td>
    <td><?=$value["satis_fiyati"]?></td>
    <td><?=$value["stok_adedi"]?></td>
    <td>
<form method="post" action="#">
      <input type="hidden" name="denemeid" value="<?=$value['deneme_id'];?>" >
        <input type="submit" name="del" value="Sil" >
</form>
    <form method="post" action="#">
     <input type="hidden"  name="stockincrease" value=<?=$value['deneme_id'];?>>
      <input type="submit" name="in" value="Stok Azalt">
</form>
</td>
<?php endforeach;?>
  </tr>

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