<?php
session_start();
$idDN = $_POST["idDN"];
$_SESSION['idDN']=$idDN;
header("location:update_user_news.php");
?>