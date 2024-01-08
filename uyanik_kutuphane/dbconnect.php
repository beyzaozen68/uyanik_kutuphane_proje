<?php
$host = '127.0.0.1';
$user = 'root';
$pass = 'USER';
$dbname = "uyanik_kutuphane";


try {
    $db = new PDO("mysql:host=127.0.0.1;dbname=uyanik_kutuphane;charset=utf8", "root", "");
} catch ( PDOException $e ){
     print $e->getMessage();
}



