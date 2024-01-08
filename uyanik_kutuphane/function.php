<?php
session_start();
include("dbconnect.php");


if (!(@$_SESSION['login']) && isset($_POST['login'])) {
    if($_SERVER['REQUEST_URI'] !== '/panelgiris.php' && $_SERVER['REQUEST_URI'] !== '/panelkayit.php' ){
        header("Location:/panelgiris.php");
        die();
    }
}

$error = false;


function Logincheck($username,$password) : bool {
    global $db;
    $userquery = $db->prepare("select * from personel where kullanici_adi=? and sifre=?");
    $userquery->execute([$username,$password]);
    $user = $userquery->fetch();
    if (is_array($user) > 0) {
        $_SESSION['pid'] = $user['personel_id'];
        return true;
    }
    return false;
}
function Register($username,$password,$personelad,$personalsoyad) : bool{
    global $db;

    $is_existuser = $db->prepare("select kullanici_adi from personel where kullanici_adi = ?");
    $is_existuser_run = $is_existuser->execute([$username]);

    if(@is_array($is_existuser->fetch())){
        return false;
    }
    $userquery = $db->prepare("INSERT INTO personel (personel_id, kullanici_adi, sifre,personel_ad,personel_soyad) VALUES (?,?,?,?,?)");
    $userquery->execute([rand(1,10000),$username,$password,$personelad,$personalsoyad]);
    if ($userquery) {
        return true;
    }
    return false;
}
function Addbook($kitapadi,$turid,$kitaplik_no,$raf_no,$yazaradi) : bool {
    global $db;
    $bookquery = $db->prepare("INSERT INTO kitap (kitap_id, tur_id, kitap_ad, yazaradi, kitaplik_no, raf_no) VALUES (?,?,?,?,?,?)");
    $bookquery->execute([rand(1,100000),$turid,$kitapadi,$yazaradi,$kitaplik_no,$raf_no]);
    if ($bookquery) {
        return true;
    }
    return false;

}
function Getbooklist() {
    global $db;
    $booklist = $db->query("SELECT kitap_id,kitap_ad,yazaradi,kitaplik_no,raf_no,turler.tur_ad,kitap.emanet_durumu FROM kitap INNER JOIN turler ON turler.tur_id = kitap.tur_id order by kitap_id;");

   
    if (is_array($booklist->fetch())) {
        return $booklist->fetchAll();

    }
    return array();

}

function Addrequest($talepkitapadi,$yazaradi,$taleptarihi,$kitapturu) : bool { 
    global $db;
    $requestquery = $db->prepare("INSERT INTO talep (talep_no, talep_kitap_adi, talep_durum, yazaradi, taleptarihi, kitapturu) VALUES (?,?,?,?,?,?)");
    $requestquery->execute([rand(1,1000000),$talepkitapadi,"beklemede",$yazaradi,$taleptarihi,$kitapturu]);
    if ($requestquery) {
        return true;
    }
    return false;
}

function Requestlist() {
    global $db;
    $requestlist = $db->query("SELECT * FROM talep inner join turler on talep.kitapturu = turler.tur_id;");
    $requestlistd = $requestlist->fetchAll();

    if (is_array($requestlistd)) {
        return $requestlistd;

    }
    return array();

}

function Addtemp($emanetalan,$telno,$salonno,$masano,$zaman,$kitapadi){
   global $db;

    $tempquery = $db->prepare("INSERT INTO emanet (emanet_id, personel_id, emanet_alan, masa_no, emanet_tarihi, kitap_id, salonno, telno) VALUES (?, ?, ?,?,?,?,?,?);");
    $tempquery->execute([rand(1,150000), $_SESSION['pid'],$emanetalan,$masano,$zaman,$kitapadi,$salonno,$telno]);
    
    if($tempquery){
        $durum = $db->prepare("UPDATE kitap SET emanet_durumu = 1 WHERE kitap_id = ?");
        $durum->execute([$kitapadi]);
        return true;
    }else{
        
        
    }
    return false;
}

function templist(){
    global $db;
    $templist = $db->query("SELECT emanet.emanet_id,kitap.kitap_ad,emanet.emanet_alan,emanet.telno,emanet.salonno,emanet.masa_no,emanet.emanet_tarihi FROM emanet INNER JOIN kitap ON emanet.kitap_id = kitap.kitap_id;")->fetchAll();
    if(is_array($templist)){
        return $templist;
    }

    return array();

}

function getBookCount(){
    global $db;
    $total = $db->query("SELECT COUNT(*) as total FROM kitap where emanet_durumu != 1")->fetch();

    if(!empty($total['total'])){
        return $total['total'];
    }
    return 0;
}

function getTrialCount(){
    global $db;
    $total = $db->query("SELECT COUNT(*) as total FROM deneme")->fetch();

    if(!empty($total['total'])){
        return $total['total'];
    }
    return 0;
}

function getRequestCount(){
    global $db;
    $total = $db->query("SELECT COUNT(*) as total FROM talep  where talep_durum !='rededildi'")->fetch();

    if(!empty($total['total'])){
        return $total['total'];
    }
    return 0;
}

function deleteBookfromLibrary($id = false){
    global $db;
    if(!$id){
        return false;
    }

    $delete_query = $db->prepare("delete from kitap where kitap_id = ?");
    $delete =$delete_query->execute([$id]);
    if($delete){
        return true;
    }

    return false;
}

function getbookfromid($id = false){
    global $db;
    
    if(!$id){
        return array();
    }


    $get_book = $db->prepare("select * from kitap where kitap_id = ?");
    $get_book->execute([$id]);
    $guncelle=$get_book->fetch();

    if (is_array($guncelle)) {
        return $guncelle;
    }
    return array();
}

function UpdateBook($id,$kitapadi,$turid,$kitaplik_no,$raf_no,$yazaradi) : bool {
    global $db;
    $bookquery = $db->prepare("update kitap set  tur_id =?, kitap_ad = ?  , yazaradi = ?  , kitaplik_no = ?, raf_no = ? where kitap_id = ?");
    $bookquery->execute([$turid,$kitapadi,$yazaradi,$kitaplik_no,$raf_no,$id]);
    if ($bookquery) {
        return true;
    }
    return false;

}

function deleteBookfromTemp($id = false){
    global $db;
    if(!$id){
        return false;
    }

    $delete_query = $db->prepare("delete from emanet where emanet_id = ?");
    $delete =$delete_query->execute([$id]);
    if($delete){
        return true;
    }

    return false;
}


function addattempt($denemead,$deneme_tur,$stok_adedi,$satis_fiyat,$satis_durum){
    global $db;
    $addq = $db->prepare("INSERT INTO deneme (deneme_id, denemead, deneme_tur, stok_adedi, satis_fiyati, satis_durumu) VALUES (?, ?, ?, ?,?,?)");
    $addrun = $addq->execute([rand(20,5000),$denemead,$deneme_tur,$stok_adedi,$satis_fiyat,$satis_durum]);
    if($addrun){
        return true;
    }
    return false;

}

function GetattemptList(){
    global $db;
    $list = $db->query("SELECT * from deneme")->fetchAll();
    if($list){
        return $list;
    }
    return array();
}
