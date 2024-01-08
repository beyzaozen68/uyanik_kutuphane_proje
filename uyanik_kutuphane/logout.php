<?php
include("function.php");
if ($_SESSION['login'] == 1) {
    $_SESSION['login'] = 0;
    header("Location:/index.php");


}
?>